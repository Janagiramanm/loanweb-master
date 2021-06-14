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
use App\Model\ModtAppointment;
use App\Model\Occupation;
use App\Model\SecondaryApplicant;
use App\User;
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

    public function kycDetails(Request $request)
    {
        $input = $request->all();
        $id = $input['cust_id'];
        $type_id = $input['ap_type_id'];
        $occupation_id = $input['occupation_id'];
        $extra_docs = [];
        if($type_id  == 1 ||  $type_id  == 2){
            $cust_docs = Customer::where('id', '=', $id)->get();
            if(isset($cust_docs[0])){
                $existingdocs = explode(",", $cust_docs[0]['docs_ids']);
                $documents = RequiredDoc::where('occupation_id', '=', $occupation_id )->whereNotIn('id', $existingdocs)->get();
            }else{
                $documents = RequiredDoc::where('occupation_id', '=', $occupation_id )->get();
            }
        }
        
         
        elseif($type_id  == 3) {
            $cust_docs = Customer::where('id', '=', $id)->get();
            if(isset($cust_docs[0])){
                $existingdocs = explode(",", $cust_docs[0]['docs_ids']);
                $documents = RequiredDoc::where('type_of_doc', '=', 'Bank Visit')->whereNotIn('id', $existingdocs)->get();
            }else{
                $documents = RequiredDoc::where('type_of_doc', '=', 'Bank Visit')->get();
            }
        }  
        elseif($type_id==7){
            $cust_docs = Customer::where('id', '=', $id)->get();
            if(isset($cust_docs[0])){
                $existingdocs = explode(",", $cust_docs[0]['docs_ids']);
                $documents = RequiredDoc::where('type_of_doc', '=', 'Submit Demand')->whereNotIn('id', $existingdocs)->get();
            }else{
                $documents = RequiredDoc::where('type_of_doc', '=', 'Submit Demand')->get();
            }
        }
        elseif($type_id==8){
            $cust_docs = Customer::where('id', '=', $id)->get();
            if(isset($cust_docs[0])){
                $existingdocs = explode(",", $cust_docs[0]['docs_ids']);
                $documents = RequiredDoc::where('type_of_doc', '=', 'MODT Drop')->whereNotIn('id', $existingdocs)->get();
            }else{
                $documents = RequiredDoc::where('type_of_doc', '=', 'MODT Drop')->get();
            }
        }
        elseif($type_id==9){
            $cust_docs = Customer::where('id', '=', $id)->get();
            if(isset($cust_docs[0])){
                $existingdocs = explode(",", $cust_docs[0]['docs_ids']);
                $documents = RequiredDoc::where('type_of_doc', '=', 'MODT Pickup')->whereNotIn('id', $existingdocs)->get();
            }else{
                $documents = RequiredDoc::where('type_of_doc', '=', 'MODT Pickup')->get();
            }
        }  
        elseif($type_id  == 5 || $type_id  == 6) {
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
        if($type_id  == 4){
            $extra_docs = ExtaDocs::where('customer_id', '=', $id)->get();
        }  

        //$extra_docs = ExtaDocs::where('customer_id', '=', $id)->get();

       
        $secondary = SecondaryApplicant::where('customer_id','=', $id)->get();
       
        $sec_cust = [];
        if($secondary){
            $i=0;
            foreach($secondary as $second){
               $sec_cust[$i]['name'] =  $second->name;
               $sec_appointment = Appointment::where('customer_id','=',$second->id)
               ->where('applicant_type','=','secondary')->first();
               if(isset($sec_appointment->docs_ids) != ''){
                    $existingdocs_sec = explode(",", $sec_appointment->docs_ids);
                    $sec_cust[$i]['documents']= RequiredDoc::where('occupation_id', '=', $second->occupation_id )->whereNotIn('id', $existingdocs_sec)->get();
               }else{
                    if($second->is_same_address !=1){
                        $sec_cust[$i]['documents']= RequiredDoc::where('occupation_id', '=', $second->occupation_id )->get();
                    }
                   
               }
                $i++;
            }

        }

        if(!empty($extra_docs)){
            if(empty($documents)){
                $documents = $extra_docs;
            }
        }

        if(!empty($documents)){
            $count = count($documents);
            for($i = 0; $i < $count; $i++){
                $documents[$i]['checked'] = false;
            }
            $msg = [
                'status' => 1,
                'customer' =>[
                    'primary' => $documents,
                    'extra_docs'=>$extra_docs,
                    'secondary_customer' => $sec_cust 
                ]
                
            ];
            return response()->json( $msg, $this->successStatus);
        }

        $msg = [
            'status' => 0,
            'message' => 'No Data Found'
        ];
        return response()->json( $msg, $this->successStatus);

    }

    public function submitApplication(Request $request)
    {
        $input = $request->all();

        $doc_ids        = $input['document_ids'];
        $cust_id        = $input['customer_id'];
        $appointment_id = $input['appointment_id'];
        $comment = $input['comment'];

        $user = Auth::user();
        $user_id =  $user->id;

        try{
           
            $send_docs = explode(',',$doc_ids);
            $customer = Customer::find($cust_id);
            $req_documents = RequiredDoc::where('occupation_id', '=', $customer->occupation_id)->get();
            if($req_documents){
                foreach($req_documents as $req_doc){
                    $required_doc[] = $req_doc->id;
                }
                
            }
            $appointments = Appointment::find($appointment_id);
            $collected_docs =  explode(',',$appointments->docs_ids);
            $docs_to_update = array_diff($send_docs, $collected_docs);
           
           if(!empty($docs_to_update)){
                $docs_to_update_val = implode(',',$docs_to_update);
                $appointments->docs_ids .= $appointments->docs_ids ? ','.$docs_to_update_val: $docs_to_update_val ;
                $appointments->comments = $comment;
                $appointments->status = 0;
                $appointments->save();
            
                $customer->docs_ids .=  $customer->docs_ids ? ','.$docs_to_update_val : $docs_to_update_val;
                $customer->save();

           }
           $final_docs = explode(',',$appointments->docs_ids);
           $missing_docs = array_diff($required_doc, $final_docs);
       
           if(empty($missing_docs)){
                $appointments->status = 0;
                $appointments->save();
            }
      
            return response()->json(['status'=>1,'message' => "Documents Submitted Successfully!"], $this->successStatus);
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

    public function modtAppointments(Request $request){
        $agent_id = $request->user_id;
        $appointments = ModtAppointment::where('agent_id','=',$agent_id)
        ->where('status','=',1)->get(); 
        $result = [];
        if(!$appointments->isEmpty()){
            
            $i=0;
            // echo '<pre>';
            // print_r($appointments);//exit;
            foreach($appointments as $appointment){

                 $customer = Customer::where('id','=',$appointment->customer_id)->first();
                 $occupation = Occupation::where('id','=', $customer->occupation_id)->first();

                
               
                $result[$i]['customer_id'] = $customer->id;
                $result[$i]['name'] = $customer->cust_name;
                $result[$i]['mobile'] = $customer->cust_phone;
                $result[$i]['occupation_id'] = $occupation->id;
                $result[$i]['occupation_name'] = $occupation->occupation_name;
                $result[$i]['appointment_date'] = $appointment->appointment_date;
                $result[$i]['applicant_type'] = $appointment->applicant_type;
                $result[$i]['appointment_id'] = $appointment->id;
                $result[$i]['start_flag'] = "true";
                if($appointment->start_time != ''){
                    $result[$i]['start_flag'] = "false";
                }

                $i++;
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

    public function appointmentDetails(Request $request){

        $user_id = $request->user_id;
        $appointmenttype_id = $request->appointmenttype_id;

        $appointments = Appointment::where('agent_id','=',$user_id)
        ->where('appointmenttype_id','=',$appointmenttype_id)
        ->where('status','=',1)->get();   
        $result = [];
        if(!$appointments->isEmpty()){
            
            $i=0;
            // echo '<pre>';
            // print_r($appointments);//exit;
            foreach($appointments as $appointment){

                 $customer = Customer::where('id','=',$appointment->customer_id)->first();
                 $occupation = Occupation::where('id','=', $customer->occupation_id)->first();

                
               
                $result[$i]['customer_id'] = $customer->id;
                $result[$i]['name'] = $customer->cust_name;
                $result[$i]['mobile'] = $customer->cust_phone;
                $result[$i]['occupation_id'] = $occupation->id;
                $result[$i]['occupation_name'] = $occupation->occupation_name;
                $result[$i]['appointment_date'] = $appointment->appointment_date;
                $result[$i]['applicant_type'] = $appointment->applicant_type;
                $result[$i]['appointment_id'] = $appointment->id;
                $result[$i]['start_flag'] = "true";
                if($appointment->start_time != ''){
                    $result[$i]['start_flag'] = "false";
                }

                if($appointment->applicant_type == 'secondary'){
                    $secondary = SecondaryApplicant::where('id','=',$appointment->second_customer_id)->first();
                    $result[$i]['customer_id'] = $secondary->id;
                    $result[$i]['name'] = $secondary->name;
                    $result[$i]['mobile'] = $secondary->phone;
                    $result[$i]['occupation_id'] = $secondary->occupation_id;
                    $result[$i]['occupation_name'] = $occupation->occupation_name;
                    $result[$i]['appointment_date'] = $appointment->appointment_date;
                    $result[$i]['applicant_type'] = $appointment->applicant_type;
                    $result[$i]['appointment_id'] = $appointment->id;
                }

                $i++;
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

    public function saveLatLong(Request $request){
        $input = $request->all();

        $appointment_id = $input['appointment_id'];
        $latitude = $input['latitude'];
        $longitude = $input['longitude'];
        $type = $input['type'];

        $appointment = Appointment::find($appointment_id);
        if(!$appointment){
            return response()->json(['status'=>0,'message' => "Data Not Found"], 404);
        }
        if($type == 'start'){
            $appointment->latitude = $latitude;
            $appointment->longitude = $longitude;
            $appointment->start_time = date('Y-m-d H:i');
        }
        if($type == 'stop'){
            $appointment->stop_lat = $latitude;
            $appointment->stop_long = $longitude;
            $appointment->stop_time = date('Y-m-d H:i');
        }
        
        if($appointment->save()){
           return response()->json(['status'=>1,'message' => "Latitude and Longitude updated Successfully!"], $this->successStatus);
        }

    }

    public function appointmentHistory(Request $request){

        $appointments = Appointment::where('status','=',0)->get();   

        if(!$appointments->isEmpty()){
            $result = [];
            $i = 0;
            foreach($appointments as $appointment){

                 $customer = Customer::where('id','=',$appointment->customer_id)->first();
                 
                 $occupation = Occupation::where('id','=', $customer->occupation_id)->first();
                 $agentName = User::where('id','=',$appointment->agent_id)->first()->name;
                 $result[$i]['cust_type'] = 'primary';
                 if($appointment->applicant_type == 'secondary'){
                     $secondary = SecondaryApplicant::where('customer_id','=',$appointment->customer_id)->first();
                     $customer = Customer::where('id','=',$secondary->id)->first();
                     $occupation = Occupation::where('id','=', $secondary->occupation_id)->first();
                     $result[$i]['cust_type'] = 'secondary';
                 }

                $result[$i]['name'] = $customer->cust_name;
                $result[$i]['mobile'] = $customer->cust_phone;
                $result[$i]['occupation_id'] = $occupation->id;
                $result[$i]['occupation_name'] = $occupation->occupation_name;
                $result[$i]['appointment_date'] = $appointment->appointment_date;
                $result[$i]['agent_name'] = $agentName;

                $i++;
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
