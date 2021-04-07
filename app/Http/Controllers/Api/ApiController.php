<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\ExtaDocs;
use App\Model\RequiredDoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\TypeOfAppointment;
use Illuminate\Support\Facades\Auth;
use App\Customer;
use App\Exports\CustomerExport;
use App\Model\Appointment;
use App\Model\Occupation;

class ApiController extends Controller
{
    public $successStatus = 200;

    public function typeOfAppointments(Request $request)
    {
        $user = Auth::user();
        $user_id =  $user->id;
        $types = TypeOfAppointment::all();
        $output = array();
        foreach ($types as $value) {
            $types = DB::table('appointment')
                    ->join('customers', 'customers.id', '=', 'appointment.customer_id')
                    ->where([['appointment.agent_id', '=', $user_id], ['appointment.appointmenttype_id', '=', $value->id], ['appointment.status', '=', 1]])
                    ->count();

            $data = array('count' => $types, 'type_name' => $value->appointment_name, 'type_id' => $value->id );
            array_push($output, $data);
        }
        return response()->json(['success' => $output], $this->successStatus);

    }
    public function newAppointments(Request $request)
    {
        $user = Auth::user();
        $user_id =  $user->id;
        $input = $request->all();
        $type_id = $input['typeId'];

        $agents = DB::table('appointment')
                    ->join('users', 'users.id', '=', 'appointment.agent_id')
                    ->join('customers', 'customers.id', '=', 'appointment.customer_id')
                    ->join('time_slots', 'time_slots.id', '=', 'appointment.timeslot_id')
                    ->where([['appointment.agent_id', '=', $user_id],['appointment.status', '=', 1],['appointment.appointmenttype_id', '=', $type_id]] )
                    ->select(   'customers.id as cust_id', 'customers.cust_name',
                                'customers.cust_phone', 'customers.cust_address', 'customers.occupation_id', 'appointment.appointment_date', 'appointment.appointmenttype_id',
                                'time_slots.time_slot', 'appointment.id as appointment_id' )
                    ->get();

        return response()->json(['success' => $agents], $this->successStatus);
    }

    public function custreqdocs(Request $request)
    {
        $input = $request->all();
        $id = $input['cust_id'];
        $type_id = $input['ap_type_id'];
        $occupation_id = $input['occupation_id'];
        if($type_id  == 1 ||  $type_id  == 2){
            $cust_docs = Customer::where('id', '=', $id)->get();
            if(isset($cust_docs[0])){
                $existingdocs = explode(",", $cust_docs[0]['docs_ids']);
                $documents = RequiredDoc::where('occupation_id', '=', $occupation_id )->whereNotIn('id', $existingdocs)->get();
            }else{
                $documents = RequiredDoc::where('occupation_id', '=', $occupation_id )->get();
            }
        }elseif($type_id  == 4){
            $documents = ExtaDocs::where('customer_id', '=', $id)->get();
        }elseif($type_id  == 5 || $type_id  == 6) {
            $cust_docs = Customer::where('id', '=', $id)->get();
            if(isset($cust_docs[0])){
                $existingdocs = explode(",", $cust_docs[0]['docs_ids']);
                $documents = RequiredDoc::where('type_of_doc', '=', 'Disbursement')->whereNotIn('id', $existingdocs)->get();
            }else{
                $documents = RequiredDoc::where('type_of_doc', '=', 'Disbursement')->get();
            }
        }else{
            $documents = [];
        }
        $count = count($documents);
        for($i = 0; $i < $count; $i++){
            $documents[$i]['checked'] = false;
        }

        return response()->json(['success' => $documents], $this->successStatus);
    }

    public function submitApplication(Request $request)
    {
        $input = $request->all();

        $doc_ids        = $input['doc_ids'];
        $cust_id        = $input['cust_id'];
        $appointment_id = $input['appointment_id'];

        $user = Auth::user();
        $user_id =  $user->id;

        try{
            $cust_docs    = Customer::where('id', '=', $cust_id)->get();

            $docs = isset($cust_docs[0]) ? $cust_docs[0]['docs_ids'].",".$doc_ids : $doc_ids  ;

            $customers    = Customer::where('id', '=', $cust_id)->update(['docs_ids' => $docs]);
            $appointments = Appointment::where('id', '=', $appointment_id)->update(['docs_ids' => $doc_ids, 'status' => 0]);
            return response()->json(['success' => "Documents Submitted Successfully!"], $this->successStatus);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], $this->successStatus);
        }

    }

    public function closedAppointments(Request $request)
    {
        $user = Auth::user();
        $user_id =  $user->id;

        $customers = Customer::where('emp_id', '=', $user_id)->get();
        $output = array();

        foreach($customers as $cust){
            $count = DB::table('appointment')
                        ->where([['appointment.customer_id', '=', $cust->id], ['appointment.status', '=', 0]])
                        ->count();
            $agents = DB::table('appointment')
                        ->join('customers', 'customers.id', '=', 'appointment.customer_id')
                        ->where([['appointment.agent_id', '=', $user_id],['appointment.status', '=', 0], ['appointment.customer_id', '=', $cust->id]] )
                        ->select('customers.id as cust_id', 'appointment.id', 'customers.cust_name' )
                        ->get();

            if(isset($agents[0]->cust_name) && $count > 0){
                $data = array('count' => $count,
                                'cust_name' => $agents[0]->cust_name, 'cust_id' => $agents[0]->cust_id);
                array_push($output, $data);
            }
        }

        return response()->json(['success' => $output], $this->successStatus);

    }

    public function appointmentDetails(Request $request){

        $user_id = $request->user_id;
        $appointmenttype_id = $request->appointmenttype_id;

        $appointments = Appointment::where('agent_id','=',$user_id)
        ->where('appointmenttype_id','=',$appointmenttype_id)->get();

        if($appointments){
            $result = [];
            foreach($appointments as $appointment){

                 $customer = Customer::where('id','=',$appointment->agent_id)->first();
                 $occupation = Occupation::where('id','=', $customer->occupation_id)->first();

                $result['name'] = $customer->cust_name;
                $result['mobile'] = $customer->cust_phone;
                $result['occupation'] = $occupation->occupation_name;
            }
            $msg =[
                'status' => 1,
                'data' => $result
            ];
            return response()->json($msg);
        }

        $msg = [
            'status' => 0,
             'message' => 'Data not found'
        ];
        return response()->json($msg);
       
    }

    
}
