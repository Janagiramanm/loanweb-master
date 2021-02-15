<?php

namespace App\Http\Controllers\Admin;

use App\Customer;
use App\Model\Appointment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;
use App\Model\Timeslot;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Model\TypeOfAppointment;
use Illuminate\Support\Facades\Redirect;
use App\Model\Bank;
use App\Model\Occupation;
use App\Model\Disbursement;
use App\Model\RequiredDoc;
use App\Model\ExtaDocs;
use App\Model\TwoThreeApplicant;

use App\Imports\CustomerImport;
use App\Imports\AllCustomerImport;
use App\Imports\DisbursementImport;

use App\Exports\CustomerExport;
use App\Exports\PipelineCustomerExport;
use App\Exports\CustomerLoginProcessExport;
use App\Exports\SanctionedCustomerExport;
use App\Exports\DisbursedCustomerExport;


class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /******* * The func newLeads will give us all new leads *********** */
    public function newLeads()
    {
        $customers = DB::table('customers')
                    ->join('application_status', 'application_status.id', '=', 'customers.application_status')
                    ->where([['customers.application_status', '=', 1], ['customers.application_deleted', '=', 0] ])
                    ->select('customers.id as cust_id', 'customers.cust_name', 'customers.cust_email', 'customers.cust_phone', 'customers.property_cost')
                    ->orderBy('customers.id', 'DESC')
                    ->get();

        return view('back-office.customers.newlead', compact('customers') );
    }

    /******* * The func  customers will give us Pipeline Data *********** */
    public function customers()
    {
        $customers = DB::table('customers')
                    ->join('application_status', 'application_status.id', '=', 'customers.application_status')
                    ->where([['customers.application_status', '=', 2], ['customers.application_deleted', '=', 0] ])
                    ->select('customers.id as cust_id', 'customers.cust_name', 'customers.cust_email', 'customers.cust_phone', 'customers.property_cost')
                    ->orderByDesc('customers.id')
                    ->get();
        return view('back-office.customers.customers', compact('customers'));
    }

    /******* * The func  customers will give us Pipeline Data *********** */
    public function sendtobank()
    {
        $customers = DB::table('customers')
                    ->join('application_status', 'application_status.id', '=', 'customers.application_status')
                    ->where([['customers.application_status', '=', 3], ['customers.application_deleted', '=', 0] ])
                    ->select('customers.id as cust_id', 'customers.cust_name', 'customers.cust_email', 'customers.cust_phone', 'customers.property_cost')
                    ->orderByDesc('customers.id')
                    ->get();
        return view('back-office.customers.sendtobank', compact('customers'));
    }

    /******* * The func loginProcess will give us all the data of doc collection completed data *********** */
    public function loginProcess()
    {
        $customers = DB::table('customers')
                    ->join('application_status', 'application_status.id', '=', 'customers.application_status')
                    ->where([['customers.application_status', '=', 4], ['customers.application_deleted', '=', 0] ])
                    ->select('customers.id as cust_id', 'customers.cust_name', 'customers.cust_email', 'customers.cust_phone', 'customers.property_cost')
                    ->orderByDesc('customers.id')
                    ->get();
        return view('back-office.customers.loginProcess', compact('customers'));
    }

    /******* * The func sanctioneddata will give us bank approved customers ddata *********** */
    public function sanctionData()
    {
        $customers = DB::table('customers')
                    ->join('application_status', 'application_status.id', '=', 'customers.application_status')
                    ->where([['customers.application_status', '=', 5], ['customers.application_deleted', '=', 0] ])
                    ->select('customers.id as cust_id', 'customers.cust_name', 'customers.cust_email', 'customers.cust_phone', 'customers.property_cost')
                    ->orderByDesc('customers.id')
                    ->get();
        return view('back-office.customers.sanctioned', compact('customers'));
    }

    /******* * The func readytodisburse will give us bank approved customers ddata *********** */
    public function readytodisburse()
    {
        $customers = DB::table('customers')
                    ->join('application_status', 'application_status.id', '=', 'customers.application_status')
                    ->where([['customers.application_status', '=', 6], ['customers.application_deleted', '=', 0] ])
                    ->select('customers.id as cust_id', 'customers.cust_name', 'customers.cust_email', 'customers.cust_phone', 'customers.property_cost')
                    ->orderByDesc('customers.id')
                    ->get();
        return view('back-office.customers.readytodisburse', compact('customers'));
    }

    /******* * The func disbursebank will give us bank approved customers ddata *********** */
    public function disbursebank()
    {
        $customers = DB::table('customers')
                    ->join('application_status', 'application_status.id', '=', 'customers.application_status')
                    ->where([['customers.application_status', '=', 7], ['customers.application_deleted', '=', 0] ])
                    ->select('customers.id as cust_id', 'customers.cust_name', 'customers.cust_email', 'customers.cust_phone', 'customers.property_cost')
                    ->orderByDesc('customers.id')
                    ->get();
        return view('back-office.customers.disbursebank', compact('customers'));
    }

    /******* * The func chequefixing will give us bank approved customers ddata *********** */
    public function chequefixing()
    {
        $customers = DB::table('customers')
                    ->join('application_status', 'application_status.id', '=', 'customers.application_status')
                    ->where([['customers.application_status', '=', 8], ['customers.application_deleted', '=', 0] ])
                    ->select('customers.id as cust_id', 'customers.cust_name', 'customers.cust_email', 'customers.cust_phone', 'customers.property_cost')
                    ->orderByDesc('customers.id')
                    ->get();
        return view('back-office.customers.chequefixing', compact('customers'));
    }

    /******* * The func disbursedapplications will give us disbursement started customer and disbursed customers *********** */
    public function disbursedapplications()
    {
        $customers = DB::table('customers')
                    ->join('application_status', 'application_status.id', '=', 'customers.application_status')
                    ->where([['customers.application_status', '=', 9], ['customers.application_deleted', '=', 0] ])
                    ->select('customers.id as cust_id', 'customers.cust_name', 'customers.cust_email', 'customers.cust_phone', 'customers.property_cost')
                    ->orderByDesc('customers.id')
                    ->get();
        return view('back-office.customers.disbursedapplications', compact('customers'));
    }

    /******* * The func disbursedapplications will give us disbursement started customer and disbursed customers *********** */
    public function partdisbursements()
    {
         $customers = DB::table('customers')
                     ->join('application_status', 'application_status.id', '=', 'customers.application_status')
                     ->where([['customers.application_status', '=', 10], ['customers.application_deleted', '=', 0] ])
                     ->select('customers.id as cust_id', 'customers.cust_name', 'customers.cust_email', 'customers.cust_phone', 'customers.property_cost')
                     ->orderByDesc('customers.id')
                     ->get();
         return view('back-office.customers.partdisbursements', compact('customers'));
    }

    /******* * The func disbursedapplications will give us disbursement started customer and disbursed customers *********** */
    public function partchequefixing()
    {
         $customers = DB::table('customers')
                     ->join('application_status', 'application_status.id', '=', 'customers.application_status')
                     ->where([['customers.application_status', '=', 11], ['customers.application_deleted', '=', 0] ])
                     ->select('customers.id as cust_id', 'customers.cust_name', 'customers.cust_email', 'customers.cust_phone', 'customers.property_cost')
                     ->orderByDesc('customers.id')
                     ->get();
         return view('back-office.customers.partchequefixing', compact('customers'));
    }
     /******* * The function to get self funding Customers *********** */
     public function selfFunding()
     {
         $customers = DB::table('customers')
                     ->join('application_status', 'application_status.id', '=', 'customers.application_status')
                     ->where([['customers.application_status', '=', 12], ['customers.application_deleted', '=', 0] ])
                     ->select('customers.id as cust_id', 'customers.cust_name', 'customers.cust_email', 'customers.cust_phone', 'customers.property_cost')
                     ->orderByDesc('customers.id')
                     ->get();
         return view('back-office.customers.selffundcustomers', compact('customers'));
     }



    /******* * The func allCustomers will give us  All the customer *********** */
    public function allCustomers()
    {
        $customers = Customer::all();
        return view('back-office.customers.allcustomers', compact('customers'));
    }

    /******* * The func droppedCustomers will give us  All the deleted Customers *********** */
    public function droppedCustomers()
    {
        $customers = DB::table('customers')
                    ->join('application_status', 'application_status.id', '=', 'customers.application_status')
                    ->where('customers.application_deleted', '=', 1)
                    ->select('customers.id as cust_id', 'customers.cust_name', 'customers.cust_email', 'customers.cust_phone', 'customers.property_cost')
                    ->orderByDesc('customers.id')
                    ->get();
        return view('back-office.customers.droppedcustomers', compact('customers'));
    }

    

    /******* * The func addNewCustomer will help us to open new customer form *********** */
    public function addNewCustomer()
    {
        $banks = Bank::all();
        $occupations = Occupation::all();
        return view('back-office.customers.addnewlead', compact('banks'));
    }

    /******* * The func storeCustomer will help us to open new customer form *********** */
    public function storeCustomer(Request $request)
    {
        $input = $request->all();
        $input['applicationno'] = uniqid();
        $input['application_status'] = 1;
        $input['application_deleted'] = false;


        $customers = Customer::create($input);
        // return redirect(route())
        return  Redirect::to('back-office/customers/newleads')->with('message','Customer Upload successfully');
    }

    public function editnewcustomer($id)
    {
        try {
            $timeslots = Timeslot::all();
            $typeofappointments = TypeOfAppointment::all();
            $customer = Customer::find($id);
            $banks = Bank::all();
            $occupations = Occupation::all();
            return view('back-office.customers.editnewcustomer', compact('customer', 'timeslots', 'typeofappointments', 'banks', 'occupations'));
        } catch (\Exception $e) {
            return redirect(route('back-office.customers.index'))->with($e->getMessage());
        }
    }

    public function updatenewcustomer(Request $request, $id)
    {
        $input = $request->all();
        
       
        try {
            if(isset($input['interested'])){
                $application_status = 2;
            }
            else if(isset($input['self-funding'])){
                $application_status = 12;
            }
            else{
                $application_status = 1;
            }
            $customer = Customer::where('id', '=', $id)->update([
                'cust_name'             => $input['cust_name'],
                'cust_email'            => $input['cust_email'],
                'cust_phone'            => $input['cust_phone'],
                'cust_address'          => $input['cust_address'],
                'project_name'          => $input['project_name'],
                'builder_name'          => $input['builder_name'],
                'buying_door_no'        => $input['buying_door_no'],
                'cust_city'             => $input['cust_city'],
                'bank_id'               => $input['bank_id'],
                'occupation_id'         => $input['occupation_id'],
                'property_cost'         => $input['property_cost'],
                'mmr_payable'           => $input['mmr_payable'],
                'mmr_paid'              => $input['mmr_paid'],
                'telecallername'        => Auth::user()->name,
                'emp_id'                => isset($input['appointment_agent']) ? $input['appointment_agent'] : null ,
                'application_status'    => $application_status,
                'application_deleted'    => isset($input['not-interested']) ? 1 : 0,
                'reason'    => isset($input['not-interested']) ? $input['reason_not_interest'] : NULL
            ]);

            if(!empty($input['twoapplicant']) && $input['twoapplicant']['name']!=''){

                //echo '<pre>';
                // print_r($input['twoapplicant']);
                // exit;

                $twoapplicant = new TwoThreeApplicant();
                $twoapplicant->customer_id = $id; 
                $twoapplicant->name = $input['twoapplicant']['name']; 
                $twoapplicant->phone = $input['twoapplicant']['phone']; 
                $twoapplicant->email = $input['twoapplicant']['email']; 
                $twoapplicant->occupation_id = $input['twoapplicant']['occupation_id']; 
                $twoapplicant->zipcode = $input['twoapplicant']['pincode']; 
                $twoapplicant->address = $input['twoapplicant']['address']; 
                $twoapplicant->cust_type = 'twoapplicant'; 
                $twoapplicant->save();

                if($input['primary']['appointment_agent'] !=''){
                        $appointment = new Appointment();
                        $appointment->agent_id  = $input['primary']['appointment_agent'];
                        $appointment->customer_id  = $id;
                        $appointment->appointment_date  = date('Y-m-d', strtotime($input['primary']['appointment_date']));
                        $appointment->timeslot_id  = $input['primary']['appointment_time'];
                        $appointment->created_excutive  = Auth::user()->id;
                        $appointment->status = 1;
                        $appointment->appointmenttype_id = $input['primary']['type_of_appointment'];
                        $appointment->applicant_type = 'twoapplicant';
                        $appointment->save();
                }
                
                
            }
            if(!empty($input['threeapplicant']) && $input['threeapplicant']['name']!=''){

                    $threeapplicant = new TwoThreeApplicant();
                    $threeapplicant->customer_id = $id; 
                    $threeapplicant->name = $input['threeapplicant']['name']; 
                    $threeapplicant->phone = $input['threeapplicant']['phone']; 
                    $threeapplicant->email = $input['threeapplicant']['email']; 
                    $threeapplicant->occupation_id = $input['threeapplicant']['occupation_id']; 
                    $threeapplicant->zipcode = $input['threeapplicant']['pincode']; 
                    $threeapplicant->address = $input['threeapplicant']['address']; 
                    $threeapplicant->cust_type = 'threeapplicant'; 
                    $threeapplicant->save();

                    if($input['secondary']['appointment_agent']!=''){
                            $appointment = new Appointment();
                            $appointment->agent_id  = $input['secondary']['appointment_agent'];
                            $appointment->customer_id  = $id;
                            $appointment->appointment_date  = date('Y-m-d', strtotime($input['secondary']['appointment_date']));
                            $appointment->timeslot_id  = $input['secondary']['appointment_time'];
                            $appointment->created_excutive  = Auth::user()->id;
                            $appointment->status = 1;
                            $appointment->appointmenttype_id = $input['secondary']['type_of_appointment'];
                            $appointment->applicant_type = 'threeapplicant';
                            $appointment->save();
                    }

            }

           
            if(isset($input['interested'])  && $input['interested'] == 1){

                $appointment = Appointment::create([
                    'agent_id'          => $input['appointment_agent'],
                    'customer_id'       => $id,
                    'appointment_date'  => date('Y-m-d', strtotime($input['appointment_date'])),
                    'timeslot_id'       => $input['appointment_time'],
                    'created_excutive'  => Auth::user()->id,
                    'status'            => 1,
                    'appointmenttype_id'=> $input['type_of_appointment'],
                    'applicant_type'=> 'normal'
                ]);

                $customers = DB::table('customers')
                            ->join('application_status', 'application_status.id', '=', 'customers.application_status')
                            ->where([['customers.application_status', '=', 2], ['customers.application_deleted', '=', 0] ])
                            ->select('customers.id as cust_id', 'customers.cust_name', 'customers.cust_email', 'customers.cust_phone')
                            ->orderByDesc('cust_id')
                            ->get();
                // dd($customers);
                return  Redirect::to('back-office/customers/customers')->with('customers', $customers )->with('message','Agent assignd to ('.$input['cust_name'].')  successfully');

            }else{
              
                $customers = DB::table('customers')
                            ->join('application_status', 'application_status.id', '=', 'customers.application_status')
                            ->where([['customers.application_status', '=', 1], ['customers.application_deleted', '=', 0] ])
                            ->select('customers.id as cust_id', 'customers.cust_name', 'customers.cust_email', 'customers.cust_phone')
                            ->orderByDesc('cust_id')
                            ->get();

                            // dd($customers);
                return  Redirect::to('back-office/customers/newleads')->with('customers', $customers )->with('message','Custoemr ('.$input['cust_name'].')  is updated successfully');

            }
         
        } catch (\Exception $e) {
           
            return redirect()->back()->with($e->getMessage());
        }
    }

    public function pipelinecustomeredit($id)
    {
        $appointments = DB::table('appointment')
                        ->join('customers', 'customers.id', '=', 'appointment.customer_id')
                        ->join('type_of_appointment', 'type_of_appointment.id', '=', 'appointment.appointmenttype_id')
                        ->join('time_slots', 'time_slots.id', '=', 'appointment.timeslot_id')
                        ->join('users', 'users.id', '=', 'appointment.agent_id')
                        ->select('users.id as user_id','users.name as agent_name', 'customers.cust_name as customer_name', 'type_of_appointment.appointment_name','appointment.id', 'appointment.appointment_date', 'appointment.applicant_type','appointment.timeslot_id','appointment.appointmenttype_id', 'time_slots.time_slot')
                        ->where('appointment.customer_id', '=', $id)
                        ->get();
        $banks = Bank::all();
        $timeslots = Timeslot::all();
        $typeofappointments = TypeOfAppointment::where('id', '!=', 1)->get();

        $customer = Customer::find($id);
        $occupations = Occupation::all();
        $documents = RequiredDoc::where('occupation_id', '=', $customer->occupation_id)->get();
        $applicants = TwoThreeApplicant::where('customer_id','=',$id)->get();
       // $agents = $this->fetchAgents($id);

        return view('back-office.customers.pipelinecustomeredit', compact('appointments', 'timeslots', 'typeofappointments', 'customer', 'banks', 'occupations', 'documents','applicants'));
    }

    public function changeAgentAppointment(Request $request){
       
            $agentId = $request->input('agentid');
            $time = $request->input('aptime');
            $id = $request->input('appointmentId');
            $date = date('Y-m-d',strtotime($request->input('apdate')));

            $appointment = Appointment::where('agent_id','=',$agentId)
                          ->where('appointment_date','=',$date)
                          ->where('timeslot_id')->first();
            if($appointment){
                $msg = [
                    'status'=> 0,
                    'message' => 'Already appointment fixed for this date and time',
                    
                ];
                return response()->json($msg);
            }

            $appoint = Appointment::find($id);
            $appoint->appointment_date = $date;
            $appoint->agent_id = $agentId;
            $appoint->timeslot_id = $time;
            $appoint->save();


            $msg = [
                'status'=> 1,
                'message' => 'Appointment has been changed successfully',
                
            ];
            return response()->json($msg);

            exit;
            

    }

    public function updatepipelinecustomer(Request $request, $id)
    {
        $input = $request->all();
        $customer = Customer::find($id);
        // dd($customer);
        try {
            $customer = Customer::where('id', '=', $id)->update([
                'cust_name'             => $input['cust_name'],
                'cust_email'            => $input['cust_email'],
                'cust_phone'            => $input['cust_phone'],
                'cust_address'          => $input['cust_address'],
                'project_name'          => $input['project_name'],
                'builder_name'          => $input['builder_name'],
                'buying_door_no'        => $input['buying_door_no'],
                'cust_city'             => $input['cust_city'],
                'bank_id'               => $input['bank_id'],
                'occupation_id'         => $input['occupation_id'],
                'property_cost'         => $input['property_cost'],
                'mmr_payable'           => $input['mmr_payable'],
                'mmr_paid'              => $input['mmr_paid'],
                'applied_loan_amount'   => $input['applied_loan_amount'],
                'telecallername'        => Auth::user()->name,
                'emp_id'                => isset($input['appointment_agent']) ? $input['appointment_agent'] : $customer->emp_id ,
                'application_status'    => isset($input['sentToLoin']) == 1 ? 3 : 2
            ]);

            if(isset($input['interested'])  && isset($input['appointment_date'])){
                $appointment = Appointment::create([
                    'agent_id'          => $input['appointment_agent'],
                    'customer_id'       => $id,
                    'appointment_date'  => date('Y-m-d', strtotime($input['appointment_date'])),
                    'timeslot_id'       => $input['appointment_time'],
                    'created_excutive'  => Auth::user()->id,
                    'status'            => 1,
                    'appointmenttype_id'=> $input['type_of_appointment']
                ]);

                $customers = DB::table('customers')
                        ->join('application_status', 'application_status.id', '=', 'customers.application_status')
                        ->where([['customers.application_status', '=', 2], ['customers.application_deleted', '=', 0] ])
                        ->select('customers.id as cust_id', 'customers.cust_name', 'customers.cust_email', 'customers.cust_phone')
                        ->orderByDesc('cust_id')
                        ->get();
                return redirect()->route('back-office.customers.customers')->with('customers', $customers )->with('message','Peding Doc collection appointment assigned successfully');;

            }

            if(isset($input['sentToLoin']) && isset($input['sent_to_bank_date'])){
                $appointment = Appointment::create([
                    'agent_id'          => $input['bank_appointment_agent'],
                    'customer_id'       => $id,
                    'appointment_date'  => date('Y-m-d', strtotime($input['sent_to_bank_date'])),
                    'timeslot_id'       => $input['sent_to_bank_time'],
                    'created_excutive'  => Auth::user()->id,
                    'status'            => 1,
                    'appointmenttype_id'=> $input['bank_appointment']
                ]);

                $customers = DB::table('customers')
                        ->join('application_status', 'application_status.id', '=', 'customers.application_status')
                        ->where([['customers.application_status', '=', 3], ['customers.application_deleted', '=', 0] ])
                        ->select('customers.id as cust_id', 'customers.cust_name', 'customers.cust_email', 'customers.cust_phone')
                        ->orderByDesc('cust_id')
                        ->get();
                return redirect()->route('back-office.customers.sendtobank')->with('customers', $customers)->with('message','Custoemr Application is processed to bank');;
            }

            $customers = DB::table('customers')
                        ->join('application_status', 'application_status.id', '=', 'customers.application_status')
                        ->where([['customers.application_status', '=', 2], ['customers.application_deleted', '=', 0] ])
                        ->select('customers.id as cust_id', 'customers.cust_name', 'customers.cust_email', 'customers.cust_phone')
                        ->orderByDesc('cust_id')
                        ->get();
            return redirect()->route('back-office.customers.customers')->with('customers', $customers )->with('message','Customer updated successfully');;


        } catch (\Exception $e) {

            return redirect()->back()->with($e->getMessage());
        }
    }

    public function editsendtobank($id)
    {
        $appointments = DB::table('appointment')
                        ->join('customers', 'customers.id', '=', 'appointment.customer_id')
                        ->join('type_of_appointment', 'type_of_appointment.id', '=', 'appointment.appointmenttype_id')
                        ->join('time_slots', 'time_slots.id', '=', 'appointment.timeslot_id')
                        ->join('users', 'users.id', '=', 'appointment.agent_id')
                        ->select('users.name as agent_name', 'customers.cust_name as customer_name', 'type_of_appointment.appointment_name', 'appointment.appointment_date', 'time_slots.time_slot')
                        ->where('appointment.customer_id', '=', $id)
                        ->get();
        $banks = Bank::all();
        $timeslots = Timeslot::all();
        $customer = Customer::find($id);
        $occupations = Occupation::all();

        $extradocs = ExtaDocs::where('customer_id', '=', $id)->get();
        return view('back-office.customers.editsendtobank', compact('appointments', 'timeslots', 'customer', 'banks', 'occupations', 'extradocs'));
    }

    public function updatesendtobank(Request $request, $id)
    {
        $input = $request->all();
        $customer = Customer::find($id);
        try {
            $customer = Customer::where('id', '=', $id)->update([
                'cust_name'             => $input['cust_name'],
                'cust_email'            => $input['cust_email'],
                'cust_phone'            => $input['cust_phone'],
                'cust_address'          => $input['cust_address'],
                'project_name'          => $input['project_name'],
                'builder_name'          => $input['builder_name'],
                'buying_door_no'        => $input['buying_door_no'],
                'cust_city'             => $input['cust_city'],
                'bank_id'               => $input['bank_id'],
                'occupation_id'         => $input['occupation_id'],
                'property_cost'         => $input['property_cost'],
                'mmr_payable'           => $input['mmr_payable'],
                'mmr_paid'              => $input['mmr_paid'],
                'telecallername'        => Auth::user()->name,
                'applied_loan_amount'   => $input['applied_loan_amount'],
                'emp_id'                => isset($input['appointment_agent']) ? $input['appointment_agent'] : $customer->emp_id ,
                'application_status'    => isset($input['sentToBank']) == 1 ? 4 : 3
            ]);

            if(isset($input['interested'])  && isset($input['appointment_date'])){
                $appointment = Appointment::create([
                    'agent_id'          => $input['appointment_agent'],
                    'customer_id'       => $id,
                    'appointment_date'  => date('Y-m-d', strtotime($input['appointment_date'])),
                    'timeslot_id'       => $input['appointment_time'],
                    'created_excutive'  => Auth::user()->id,
                    'status'            => 1,
                    'appointmenttype_id'=> $input['type_of_appointment']
                ]);

                $customers = DB::table('customers')
                        ->join('application_status', 'application_status.id', '=', 'customers.application_status')
                        ->where([['customers.application_status', '=', 2], ['customers.application_deleted', '=', 0] ])
                        ->select('customers.id as cust_id', 'customers.cust_name', 'customers.cust_email', 'customers.cust_phone')
                        ->orderByDesc('cust_id')
                        ->get();
                return redirect()->route('back-office.customers.customers')->with('customers', $customers )->with('message','Peding Doc collection appointment assigned successfully');;

            }

            if(isset($input['sentToBank'])){
                $customers = DB::table('customers')
                        ->join('application_status', 'application_status.id', '=', 'customers.application_status')
                        ->where([['customers.application_status', '=', 4], ['customers.application_deleted', '=', 0] ])
                        ->select('customers.id as cust_id', 'customers.cust_name', 'customers.cust_email', 'customers.cust_phone')
                        ->orderByDesc('cust_id')
                        ->get();
                return redirect()->route('back-office.customers.loginProcess')->with('customers', $customers)->with('message','Custoemr Application is processed to bank Successfullay');;
            }

            $customers = DB::table('customers')
                        ->join('application_status', 'application_status.id', '=', 'customers.application_status')
                        ->where([['customers.application_status', '=', 2], ['customers.application_deleted', '=', 0] ])
                        ->select('customers.id as cust_id', 'customers.cust_name', 'customers.cust_email', 'customers.cust_phone')
                        ->orderByDesc('cust_id')
                        ->get();
            return redirect()->route('back-office.customers.customers')->with('customers', $customers )->with('message','Customer updated successfully');;

        } catch (\Exception $e) {

            return redirect()->back()->with($e->getMessage());
        }
    }

    public function editSanctioned(Request $request, $id)
    {
        $customers = DB::table('customers')
                        ->leftjoin('bank', 'customers.bank_id', '=', 'bank.id')
                        ->where('customers.id', '=', $id)
                        ->select('customers.id as cust_id',
                                'customers.created_at as sub_date',
                                'customers.buying_door_no',
                                'customers.project_name',
                                'customers.cust_name',
                                'customers.telecallername',
                                'bank.bank_name',
                                'bank.bank_branch',
                                'customers.file_no',
                                'customers.cust_phone',
                                'customers.cust_email',
                                'customers.property_cost',
                                'customers.loan_amount',
                                'customers.mmr_payable',
                                'customers.mmr_paid',
                                'customers.applied_loan_amount')
                        ->get();


        $customer = $customers[0];

        return view('back-office.customers.editsanctioned', compact('customer'));

    }

    public function updateSanctionedCustomer(Request $request, $id)
    {
        $input = $request->all();

        try {

            $customer = Customer::where('id', '=', $id)->update([
                'sanctioned_amount'    => $input['sanctioned_amount'],
                'sanctioned_date'      => date('Y-m-d', strtotime($input['sanctioned_date'])),
                'pending_amount'       => $input['sanctioned_amount'],
                'application_status'   => 6,
            ]);

            $customers = DB::table('customers')
                        ->join('application_status', 'application_status.id', '=', 'customers.application_status')
                        ->where([['customers.application_status', '=', 6], ['customers.application_deleted', '=', 0] ])
                        ->select('customers.id as cust_id', 'customers.cust_name', 'customers.cust_email', 'customers.cust_phone')
                        ->orderByDesc('cust_id')
                        ->get();

            return redirect()->route('back-office.customers.readytodisburse')->with('customers', $customers )->with('message','Custoemr is updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with($e->getMessage());
        }
    }

    public function editreadytodisburse(Request $request, $id)
    {
        $customers = DB::table('customers')
                        ->leftjoin('bank', 'customers.bank_id', '=', 'bank.id')
                        ->where('customers.id', '=', $id)
                        ->select('customers.id as cust_id',
                                'customers.created_at as sub_date',
                                'customers.buying_door_no',
                                'customers.project_name',
                                'customers.cust_name',
                                'customers.telecallername',
                                'bank.bank_name',
                                'bank.bank_branch',
                                'customers.file_no',
                                'customers.cust_phone',
                                'customers.cust_email',
                                'customers.property_cost',
                                'customers.loan_amount',
                                'customers.mmr_payable',
                                'customers.mmr_paid',
                                'customers.applied_loan_amount',
                                'customers.sanctioned_amount',
                                'customers.sanctioned_date')
                        ->get();


        $customer = $customers[0];

        $timeslots = Timeslot::all();
        $typeofappointments = TypeOfAppointment::all();

        return view('back-office.customers.editreadytodisburse', compact('customer', 'typeofappointments', 'timeslots'));
    }

    public function updatereadytodisburse(Request $request, $id)
    {
        $input = $request->all();
        try {
            $disbursements = Disbursement::where('customer_id', '=', $id)->count();
            if($disbursements == 0){
                $disbursement = $disbursements + 1;
            }else{
                $disbursement = $disbursements + 1;
            }
            Disbursement::create([
                'customer_id'           => $id,
                'disbursement_amount'   => $input['disbursement_amount'],
                'date_of_disbursement'  => date('Y-m-d', strtotime($input['disbursement_date'])),
                'installment_num'       => isset($disbursement) ? (int)$disbursement : 0
            ]);
            $customer = Customer::where('id', '=', $id)->update([
                'application_status'    => isset($input['interested']) == 1 ? 7 : 6,
                'disburdsment_amount'   => $input['disbursement_amount'],
                'installment_num'       => isset($disbursement) ? (int)$disbursement : 0
           ]);

            if(isset($input['interested'])  && isset($input['appointment_date'])){
                $appointment = Appointment::create([
                    'agent_id'          => $input['appointment_agent'],
                    'customer_id'       => $id,
                    'appointment_date'  => date('Y-m-d', strtotime($input['appointment_date'])),
                    'timeslot_id'       => $input['appointment_time'],
                    'created_excutive'  => Auth::user()->id,
                    'status'            => 1,
                    'appointmenttype_id'=> $input['type_of_appointment']
                ]);
            }

            $customers = DB::table('customers')
                        ->join('application_status', 'application_status.id', '=', 'customers.application_status')
                        ->where([['customers.application_status', '=', 7], ['customers.application_deleted', '=', 0] ])
                        ->select('customers.id as cust_id', 'customers.cust_name', 'customers.cust_email', 'customers.cust_phone')
                        ->orderByDesc('cust_id')
                        ->get();
            return redirect()->route('back-office.customers.disbursebank')->with('customers', $customers )->with('message','Customer updated successfully');;


        } catch (\Exception $e) {

            return redirect()->back()->with($e->getMessage());
        }
    }

    public function editdisbursebank(Request $request, $id)
    {
        $customers = DB::table('customers')
                        ->leftjoin('bank', 'customers.bank_id', '=', 'bank.id')
                        ->where('customers.id', '=', $id)
                        ->select('customers.id as cust_id',
                                'customers.created_at as sub_date',
                                'customers.buying_door_no',
                                'customers.project_name',
                                'customers.cust_name',
                                'customers.telecallername',
                                'bank.bank_name',
                                'bank.bank_branch',
                                'customers.file_no',
                                'customers.cust_phone',
                                'customers.cust_email',
                                'customers.property_cost',
                                'customers.loan_amount',
                                'customers.mmr_payable',
                                'customers.mmr_paid',
                                'customers.applied_loan_amount',
                                'customers.sanctioned_amount', 'customers.docs_ids', 'customers.sanctioned_date')
                        ->get();


        $customer = $customers[0];
        $timeslots = Timeslot::all();
        $typeofappointments = TypeOfAppointment::all();
        $documents = RequiredDoc::where('type_of_doc', '=', 'Disbursement')->get();

        return view('back-office.customers.editdisbursebank', compact('customer', 'typeofappointments', 'timeslots', 'documents'));
    }

    public function updatedisbursebank(Request $request, $id)
    {
        $input = $request->all();
        try {
            if(isset($input['pendingDisDoc'])  && isset($input['appointment_date'])){

                $appointment = Appointment::create([
                    'agent_id'          => $input['appointment_agent'],
                    'customer_id'       => $id,
                    'appointment_date'  => date('Y-m-d', strtotime($input['appointment_date'])),
                    'timeslot_id'       => $input['appointment_time'],
                    'created_excutive'  => Auth::user()->id,
                    'status'            => 1,
                    'appointmenttype_id'=> $input['type_of_appointment']
                ]);

                $customers = DB::table('customers')
                        ->join('application_status', 'application_status.id', '=', 'customers.application_status')
                        ->where([['customers.application_status', '=', 7], ['customers.application_deleted', '=', 0] ])
                        ->select('customers.id as cust_id', 'customers.cust_name', 'customers.cust_email', 'customers.cust_phone')
                        ->orderByDesc('cust_id')
                        ->get();
                return redirect()->route('back-office.customers.disbursebank')->with('customers', $customers )->with('message','Peding Doc collection appointment assigned successfully');;

            }else {
                $customer = Customer::where('id', '=', $id)->update([
                    'application_status'    => isset($input['pendingDisDoc']) == 1 ? 7 : 8
                ]);
                $customers = DB::table('customers')
                            ->join('application_status', 'application_status.id', '=', 'customers.application_status')
                            ->where([['customers.application_status', '=', 8], ['customers.application_deleted', '=', 0] ])
                            ->select('customers.id as cust_id', 'customers.cust_name', 'customers.cust_email', 'customers.cust_phone')
                            ->orderByDesc('cust_id')
                            ->get();
                    return redirect()->route('back-office.customers.chequefixing')->with('customers', $customers )->with('message','Peding Doc collection appointment assigned successfully');;

            }

        } catch (\Exception $e) {
            return redirect()->back()->with($e->getMessage());
        }
    }

    public function editchequefixing(Request $request, $id)
    {
        $customers = DB::table('customers')
                        ->leftjoin('bank', 'customers.bank_id', '=', 'bank.id')
                        ->where('customers.id', '=', $id)
                        ->select('customers.id as cust_id',
                                'customers.created_at as sub_date',
                                'customers.buying_door_no',
                                'customers.project_name',
                                'customers.cust_name',
                                'customers.telecallername',
                                'bank.bank_name',
                                'bank.bank_branch',
                                'customers.file_no',
                                'customers.cust_phone',
                                'customers.cust_email',
                                'customers.property_cost',
                                'customers.loan_amount',
                                'customers.mmr_payable',
                                'customers.mmr_paid',
                                'customers.applied_loan_amount',
                                'customers.sanctioned_amount',
                                'customers.installment_num',
                                'customers.pending_amount','customers.sanctioned_date',  'customers.disburdsment_amount')
                        ->get();
        $customer = $customers[0];
        $timeslots = Timeslot::all();
        $typeofappointments = TypeOfAppointment::all();
        return view('back-office.customers.editchequefixing', compact('customer', 'typeofappointments', 'timeslots'));

    }

    public function updatechequefixing(Request $request, $id)
    {
        $input = $request->all();
        try {
            $customer = Customer::where('id', '=', $id)->get();
            if(isset($input['cheque']) &&  $input['cheque']  == 1){
                // $data = Disbursement::where([['customer_id', '=', $id], ['neft_amount', '=', null], ['cheque_amount', '=', null]])->get();
                // dd($data);
                Disbursement::where([['customer_id', '=', $id], ['neft_amount', '=', null], ['cheque_amount', '=', null]])->update([
                    'cheque_no'     => $input['cheque_num'],
                    'cheque_amount'  => $input['cheque_amount'],
                    'cheque_date'   => date('Y-m-d', strtotime($input['cheque_date']))
                ]);

                $customer = Customer::where('id', '=', $id)->update([
                    'application_status'    =>  9,
                    'pending_amount'        => $customer[0]->pending_amount - $input['cheque_amount'],
                ]);
            }

            if(isset($input['neft']) &&  $input['neft']  == 1){
                // $data = Disbursement::where([['customer_id', '=', $id], ['neft_amount', '=', null], ['cheque_amount', '=', null]])->get();
                // dd($data);
                Disbursement::where([['customer_id', '=', $id], ['neft_amount', '=', null], ['cheque_amount', '=', null]])->update([
                    'neft_amount'     => $input['neft_amount'],
                    'neft_urt_no'  => $input['neft_utr_no'],
                    'neft_date'   => date('Y-m-d', strtotime($input['neft_date']))
                ]);
                $customer = Customer::where('id', '=', $id)->update([
                    'application_status'    =>  9,
                    'pending_amount'        => $customer[0]->pending_amount - $input['neft_amount'],
                ]);
            }


            $customers = DB::table('customers')
                        ->join('application_status', 'application_status.id', '=', 'customers.application_status')
                        ->where([['customers.application_status', '=', 9], ['customers.application_deleted', '=', 0] ])
                        ->select('customers.id as cust_id', 'customers.cust_name', 'customers.cust_email', 'customers.cust_phone')
                        ->orderByDesc('cust_id')
                        ->get();
            return redirect()->route('back-office.customers.disbursedapplications')->with('customers', $customers )->with('message','Customer updated successfully');;


        } catch (\Exception $e) {
            return redirect()->back()->with($e->getMessage());
        }
    }

    public function viewapplication(Request $request, $id)
    {
        $customers = DB::table('customers')
                        ->leftjoin('bank', 'customers.bank_id', '=', 'bank.id')
                        ->where('customers.id', '=', $id)
                        ->select('customers.id as cust_id',
                                'customers.created_at as sub_date',
                                'customers.buying_door_no',
                                'customers.project_name',
                                'customers.cust_name',
                                'customers.telecallername',
                                'bank.bank_name',
                                'bank.bank_branch',
                                'customers.file_no',
                                'customers.cust_phone',
                                'customers.cust_email',
                                'customers.property_cost',
                                'customers.loan_amount',
                                'customers.mmr_payable',
                                'customers.mmr_paid',
                                'customers.applied_loan_amount',
                                'customers.sanctioned_amount',
                                'customers.installment_num',
                                'customers.pending_amount', 'customers.sanctioned_date')
                        ->get();
        $customer = $customers[0];
        $disbursements = DB::table('disbursement_tab')
                            ->join('customers', 'customers.id', '=', 'disbursement_tab.customer_id')
                            ->where('customer_id', '=', $id)
                            ->select('customers.cust_name','disbursement_tab.*')
                            ->get();

        return view('back-office.customers.viewapplication', compact('customer', 'disbursements'));
    }

    public function sendtopartdisb(Request $request, $id)
    {
        $input = $request->all();

        try {
            $customer = Customer::where('id', '=', $id)->update([
                'application_status'    => isset($input['partdisb']) == 9 ? 10 : $input['applicationStatus']
            ]);

            $customers = DB::table('customers')
                        ->join('application_status', 'application_status.id', '=', 'customers.application_status')
                        ->where([['customers.application_status', '=', 10], ['customers.application_deleted', '=', 0] ])
                        ->select('customers.id as cust_id', 'customers.cust_name', 'customers.cust_email', 'customers.cust_phone')
                        ->orderByDesc('cust_id')
                        ->get();

            return redirect()->route('back-office.customers.partdisbursements')->with('customers', $customers )->with('message','Custoemr is updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with($e->getMessage());
        }

    }


    public function editpartdisbursements(Request $request, $id)
    {
        $customers = DB::table('customers')
                        ->leftjoin('bank', 'customers.bank_id', '=', 'bank.id')
                        ->where('customers.id', '=', $id)
                        ->select('customers.id as cust_id',
                                'customers.created_at as sub_date',
                                'customers.buying_door_no',
                                'customers.project_name',
                                'customers.cust_name',
                                'customers.telecallername',
                                'bank.bank_name',
                                'bank.bank_branch',
                                'customers.file_no',
                                'customers.cust_phone',
                                'customers.cust_email',
                                'customers.property_cost',
                                'customers.loan_amount',
                                'customers.mmr_payable',
                                'customers.mmr_paid',
                                'customers.applied_loan_amount',
                                'customers.sanctioned_amount',
                                'customers.installment_num',
                                'customers.pending_amount','customers.sanctioned_date')
                        ->get();
        $customer = $customers[0];
        $disbursements = DB::table('disbursement_tab')
                            ->join('customers', 'customers.id', '=', 'disbursement_tab.customer_id')
                            ->where('customer_id', '=', $id)
                            ->select('customers.cust_name','disbursement_tab.*')
                            ->get();
        $timeslots = Timeslot::all();
        $typeofappointments = TypeOfAppointment::all();

        return view('back-office.customers.editpartdisbursements', compact('customer', 'disbursements', 'timeslots'));
    }

    public function updatepartdisbursements(Request $request, $id)
    {
        $input = $request->all();
        try {
            $disbursements = Disbursement::where('customer_id', '=', $id)->count();
            if($disbursements == 0){
                $disbursement = $disbursements + 1;
            }else{
                $disbursement = $disbursements + 1;
            }

            Disbursement::create([
                'customer_id'           => $id,
                'disbursement_amount'   => $input['disbursement_amount'],
                'date_of_disbursement'  => date('Y-m-d', strtotime($input['disbursement_date'])),
                'installment_num'       => isset($disbursement) ? $disbursement : 0
            ]);
            $customer = Customer::where('id', '=', $id)->update([
                'application_status'    => 11,
                'disburdsment_amount'   => $input['disbursement_amount'],
                'installment_num'       => isset($disbursement) ? (int)$disbursement : 0
           ]);

            if(isset($input['interested'])  && isset($input['appointment_date'])){
                $appointment = Appointment::create([
                    'agent_id'          => $input['appointment_agent'],
                    'customer_id'       => $id,
                    'appointment_date'  => date('Y-m-d', strtotime($input['appointment_date'])),
                    'timeslot_id'       => $input['appointment_time'],
                    'created_excutive'  => Auth::user()->id,
                    'status'            => 1,
                    'appointmenttype_id'=> $input['type_of_appointment']
                ]);
            }

            $customers = DB::table('customers')
                        ->join('application_status', 'application_status.id', '=', 'customers.application_status')
                        ->where([['customers.application_status', '=', 11], ['customers.application_deleted', '=', 0] ])
                        ->select('customers.id as cust_id', 'customers.cust_name', 'customers.cust_email', 'customers.cust_phone')
                        ->orderByDesc('cust_id')
                        ->get();
            return redirect()->route('back-office.customers.partchequefixing')->with('customers', $customers )->with('message','Customer updated successfully');;


        } catch (\Exception $e) {

            return redirect()->back()->with($e->getMessage());
        }
    }

    public function editpartchequefixing(Request $request, $id)
    {
        $customers = DB::table('customers')
                        ->leftjoin('bank', 'customers.bank_id', '=', 'bank.id')
                        ->where('customers.id', '=', $id)
                        ->select('customers.id as cust_id',
                                'customers.created_at as sub_date',
                                'customers.buying_door_no',
                                'customers.project_name',
                                'customers.cust_name',
                                'customers.telecallername',
                                'bank.bank_name',
                                'bank.bank_branch',
                                'customers.file_no',
                                'customers.cust_phone',
                                'customers.cust_email',
                                'customers.property_cost',
                                'customers.loan_amount',
                                'customers.mmr_payable',
                                'customers.mmr_paid',
                                'customers.applied_loan_amount',
                                'customers.sanctioned_amount',
                                'customers.installment_num',
                                'customers.pending_amount', 'customers.sanctioned_date' , 'customers.disburdsment_amount'
                                )
                        ->get();

        $customer = $customers[0];
        $disbursements = DB::table('disbursement_tab')
                            ->join('customers', 'customers.id', '=', 'disbursement_tab.customer_id')
                            ->where('customer_id', '=', $id)
                            ->select('customers.cust_name','disbursement_tab.*')
                            ->get();

        return view('back-office.customers.editpartchequefixing', compact('customer', 'disbursements'));

    }


    public function destroy(Request $request)
    {
        $input = $request->all();
        Customer::where('id', '=', $input['hidden_cust_id'])->update(['application_deleted' => true, 'reason' => $input['reason']]);
        return redirect(route('back-office.customers.newleads'))->with('message','Customer deleted successfully');
    }



    /* +++++============+++++++++++=========Importing of File Route Functions+++++++++++++++++++++++++++++++++++++=========== */

    /******* * The func importnewCustomer will help us to import file of new customers *********** */
    public function importnewCustomer(Request $request)
    {
        $file = $request->file('customersheet');
        $customers  = Excel::toArray(new CustomerImport, $file);
        $customer = array();
        $count = count($customers[0]);
        foreach($customers[0] as $cust){
            $customer['applicationno']      = uniqid();
            $customer['cust_name']          = $cust['customer_name'];
            $customer['cust_phone']         = $cust['mobile_no'];
            $customer['cust_email']         = $cust['email_id'];
            $customer['project_name']       = $cust['project'];
            $customer['buying_door_no']     = $cust['flat_no'];
            $customer['property_cost']      = $cust['property_cost'];
            $customer['telecallername']     = Auth::user()->name;
            $customer['application_status'] = 1;
            $customers = Customer::create($customer);
        }

        return redirect()->back()->with('message', $count.' Custoemr imported successfully');
    }

    public function importDisbursement(Request $request)
    {
        $file = $request->file('customersheet');
        $customers  = Excel::toArray(new DisbursementImport, $file);
        $customer = array();
        $count = count($customers[0]);
        foreach($customers[0] as $cust){
            $customer['applicationno']       = uniqid();
            $customer['cust_name']           = $cust['customer_name'];
            $customer['cust_phone']          = $cust['phone_no'];
            $customer['cust_email']          = $cust['email_id'];
            $customer['cust_bank']           = $cust['finance_mode'];
            $customer['file_no']             = $cust['file_no'];
            $customer['project_name']        = $cust['project_name'];
            $customer['buying_door_no']      = $cust['flat_no'];
            $customer['installment_num']     = $cust['installment_no'];
            $customer['applied_loan_amount'] = $cust['loan_amount'];
            $customer['application_status']  = 9;
            $customer['telecallername']      = Auth::user()->name;
            $customers = Customer::create($customer);
        }

        return redirect()->back()->with('message', $count.' Custoemr imported successfully');
    }

    // public function importCompleteSheet(Request $request)
    // {
    //     $file = $request->file('customersheet');
    //     $customers  = Excel::toArray(new AllCustomerImport, $file);
    //     // $user->registartionId = str_rand(6 only digit)->unique;
    // }
    /* +++++============+++++++++++=========End of Importing of File Route Functions+++++++++++++++++++++++++++++++++++++=========== */


    /* +++++============+++++++++++=========Exporting of File Route Functions+++++++++++++++++++++++++++++++++++++=========== */
    /* the func allCustomerProcess will export a csv data of all customers */
    public function allCustomerProcess(Request $request)
    {
        return  Excel::download(new CustomerExport, 'allcustomers.xlsx');
    }
    /* the func pipelineCustomers will export a csv data of pipelined customers */
    public function pipelineCustomers(Request $request)
    {
        return  Excel::download(new PipelineCustomerExport, 'pipelinecustomers.xlsx');
    }
    /* the func exportloginProcess will export a csv data of login customers */
    public function exportloginProcess(Request $request)
    {
        return  Excel::download(new CustomerLoginProcessExport, 'LoginProcesscustomers.xlsx');
    }

    /* the func sanctionedProcess will export a csv data of sanctioned customers */
    public function sanctionedProcess(Request $request)
    {
        return  Excel::download(new SanctionedCustomerExport, 'sanctionedcustomers.xlsx');
    }

    /* the func disbursementProcess will export a csv data of Disbursed customers */
    public function disbursementProcess(Request $request)
    {
        return  Excel::download(new DisbursedCustomerExport, 'disbursementprocess.xlsx');
    }
    /* +++++============+++++++++++=========+++++++++++++++++++++++++++++++++++++=========== */

    /* +++++============+++++++++++=========Ajax Routes+++++++++++++++++++++++++++++++++++++=========== */
    /* this is a ajax function to get the free agents  in the list of agents  */
    public function fetchAgents(Request $request)
    {
        $input = $request->all();
        $agents = DB::table('users')
                    ->join('role_user', 'users.id', '=', 'role_user.user_id')
                    ->join('roles', 'roles.id', '=', 'role_user.role_id')
                    ->where('roles.id', '=', 3)
                    ->select('users.name as agentName', 'users.id as agent_id', 'roles.id as role_id' )
                    ->get();

        $appointments = Appointment::where([ ['appointment_date', '=', date('Y-m-d', strtotime($input['apdate']))], ['timeslot_id', '=', $input['aptime']] ])->get();
        $fieldagents = array();
        foreach($appointments as $appointment){
            array_push($fieldagents, $appointment->agent_id);
        }

        $outpuAgents = array();
        foreach($agents as $agent){
            if(!in_array($agent->agent_id, $fieldagents)){
                $array = array('agent_name' => $agent->agentName, 'agent_id' => $agent->agent_id);
                array_push($outpuAgents, $array);
            }
        }
        return json_encode($outpuAgents);
    }

    public function updatestatues(Request $request)
    {
        $input = $request->all();

        $customer = Customer::where('id', '=', $input['custId'])->update([
            'application_status'    => isset($input['applicationStatus']) == 4 ? 5 : $input['applicationStatus']
        ]);
        $success = "Status Updated Successfully";
        return json_encode($success);

    }
    /* +++++============+++++++++++=========End of Ajax Routes+++++++++++++++++++++++++++++++++++++=========== */

    public function addnewbankdoc(Request $request)
    {
        $input = $request->all();
        $data['customer_id'] = $input['cust_id'];
        $data['doc_name']    = $input['docName'];
        ExtaDocs::create($data);
        $success = "Status Updated Successfully";
        return json_encode($success);
    }
}
