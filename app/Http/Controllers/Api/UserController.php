<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Customer;
use App\Model\ModtAppointment;
use App\Model\Appointment;
use App\Model\Builder;
use App\Model\Bank;
use App\Model\BankBranch;
use App\Model\BuilderDetail;
use App\Model\Occupation;
use App\Model\SecondaryApplicant;

class UserController extends Controller
{
    public $successStatus = 200;

    public function login(Request $request) {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        // finding user
        $user = User::where('email', '=', $request->input('email'))
                ->first();

        if (!$user) {
            return response()->json([
                'status'=>0,
                'error' => 'Invalid Email'
            ],401);
        }

        // if user exist check for password
        if (!Hash::check($request->input('password'), $user->password)) {
            return response()->json([
                'status'=>0,
                'error' => 'Password doesn\'t match'
            ],401);
        }

       
        $date = date('Y-m-d');
        $token = $user->createToken('Personal Access Token')->accessToken;

        if($user->roles->first()->id == 3 ){
     
                $new_appointment_count = Appointment::where('agent_id','=',$user->id)
                ->where('appointment_date','<=',strtotime($date) )
                ->where('appointmenttype_id','=','1')
                ->where('status','=',1)
                ->count();

                $pending_docs_ldfsl = Appointment::where('agent_id','=',$user->id)
                ->where('appointmenttype_id','=','2')
                ->where('status','=',1)
                ->count();

                $bank_visit = Appointment::where('agent_id','=',$user->id)
                ->where('appointmenttype_id','=','3')
                ->where('status','=',1)
                ->count();

                $pending_docs_bank = Appointment::where('agent_id','=',$user->id)
                ->where('appointmenttype_id','=','4')
                ->where('status','=',1)
                ->count();

                $disbursment_docs_collection = Appointment::where('agent_id','=',$user->id)
                ->where('appointmenttype_id','=','5')
                ->where('status','=',1)
                ->count();

                $pending_disbursment_docs = Appointment::where('agent_id','=',$user->id)
                ->where('appointmenttype_id','=','6')
                ->where('status','=',1)
                ->count();

                $submit_demand = Appointment::where('agent_id','=',$user->id)
                ->where('appointmenttype_id','=','7')
                ->where('status','=',1)
                ->count();
            
                return response()->json([
                    'status'=>1,
                    'message' => 'Authentication successful',
                    'token' => $token,
                    'user' => $user,
                    'new_appointment' => $new_appointment_count,
                    'pending_docs_ldfsl' => $pending_docs_ldfsl,
                    'bank_visit' => $bank_visit,
                    'pending_docs_bank'=> $pending_docs_bank,
                    'disbursment_docs_collection'=> $disbursment_docs_collection,
                    'pending_disbursment_docs' => $pending_disbursment_docs,
                    'submit_demand' => $submit_demand,
                    'role' => $user->roles->first()->id

                ],200);
        }

        return response()->json([
            'status'=>1,
            'message' => 'Authentication successful',
            'token' => $token,
            'user' => $user,
            'role' => $user->roles->first()->id
        ],200);
    }

    public function countAppointment(Request $request){

               $userid = $request->userid; 
               $date = date('Y-m-d');
                $new_appointment_count = Appointment::where('agent_id','=',$userid)
                ->where('appointment_date','<=',strtotime($date) )
                ->where('appointmenttype_id','=','1')
                ->where('status','=',1)
                ->count();

                $pending_docs_ldfsl = Appointment::where('agent_id','=',$userid)
                ->where('appointmenttype_id','=','2')
                ->where('status','=',1)
                ->count();

                $bank_visit = Appointment::where('agent_id','=',$userid)
                ->where('appointmenttype_id','=','3')
                ->where('status','=',1)
                ->count();

                $pending_docs_bank = Appointment::where('agent_id','=',$userid)
                ->where('appointmenttype_id','=','4')
                ->where('status','=',1)
                ->count();

                $disbursment_docs_collection = Appointment::where('agent_id','=',$userid)
                ->where('appointmenttype_id','=','5')
                ->where('status','=',1)
                ->count();

                $pending_disbursment_docs = Appointment::where('agent_id','=',$userid)
                ->where('appointmenttype_id','=','6')
                ->where('status','=',1)
                ->count();

                $submit_demand = Appointment::where('agent_id','=',$userid)
                ->where('appointmenttype_id','=','7')
                ->where('status','=',1)
                ->count();

                $modt_drop = Appointment::where('agent_id','=',$userid)
                ->where('appointmenttype_id',['8'])
                ->where('status','=',1)
                ->count();

                $modt_pickup = Appointment::where('agent_id','=',$userid)
                ->where('appointmenttype_id',['9'])
                ->where('status','=',1)
                ->count();
            
                return response()->json([
                    'new_appointment' => $new_appointment_count,
                    'pending_docs_ldfsl' => $pending_docs_ldfsl,
                    'bank_visit' => $bank_visit,
                    'pending_docs_bank'=> $pending_docs_bank,
                    'disbursment_docs_collection'=> $disbursment_docs_collection,
                    'pending_disbursment_docs' => $pending_disbursment_docs,
                    'submit_demand' => $submit_demand,
                    'modt_drop' => $modt_drop,
                    'modt_pickup' => $modt_pickup
                ],200);
    }

    public function telecallerCustomers(Request $request){

        $username = $request->username;
        $user_type = $request->usertype;
        if($user_type == 'Administrator'){
            $customers = Customer::where('application_deleted','=',0)
            ->get();
        }else{
            $customers = Customer::where('telecallername','=',$username)
            ->get();
        }
        
        $builder_name = null;
        $bank_name  = null;
        $branch_name  = null;
        $project_name  = null;
        $occupation  = null;
        $result = [];
        if($customers){
             $i=0;
            foreach($customers as $customer){
                $builder_id = $customer->builder_name;
                $bank_id = $customer->bank_id;
                $branch_id = $customer->bank_branch;
                $project_id = $customer->project_name;
                if($builder_id){
                  $builder_name =   Builder::where('id','=',$builder_id)->first()->builder_name;
                }
                if($bank_id){
                    $bank_name = Bank::where('id','=',$bank_id)->first()->bank_name;  
                }
                if($branch_id){
                    $branch_name = BankBranch::where('id','=',$branch_id)->first()->branch_name;
                }
                if($project_id){
                    // $project =  BuilderDetail::where('id','=',$project_id)->first();
                    $project_name =  Builder::where('id','=',$project_id)->first()->project_name;
                    //$project_name = isset($project->project_name) ? $project->project_name : null;
                }
                if($customer->occupation_id){
                    $occupation = Occupation::where('id','=',$customer->occupation_id)->first()->occupation_name;
                }

                $secondary_customers = SecondaryApplicant::where('customer_id','=', $customer->id)->get();

                $result[$i]['customer_name'] = $customer->cust_name;
                $result[$i]['customer_phone'] = str_replace('/', ',', $customer->cust_phone);
                $result[$i]['buying_door_no'] = $customer->buying_door_no;
                $result[$i]['builder_id'] = $builder_id;
                $result[$i]['builder_name'] = $builder_name;
                $result[$i]['project_name'] = $project_name;
                $result[$i]['occupation'] = $occupation;
                $result[$i]['bank_id'] = $customer->bank_id;
                $result[$i]['bank_name'] = $bank_name;
                $result[$i]['branch_id'] = $customer->bank_branch;
                $result[$i]['branch_name'] = $branch_name;
                $result[$i]['secondary_customer'] = $secondary_customers;
                
                $i++;
            }
        }
        if(!empty($result)){
            return response()->json([
                'status'=>1,
                'data' => $result              
            ],200);
        }

        return response()->json([
            'status'=>0,
            'message' => 'No Data Found'              
        ],200);
      

    }



    // public function login(Request $request)
    // {
       
    //     $request->validate([ 
    //         'email' => 'required|string|email',
    //         'password' => 'required|string',
    //     ]);
    //     $credentials = request(['email', 'password']);
    //     if(!Auth::attempt($credentials)){
    //         return response()->json(['error' => 'Unauthorized'], 401);
    //     }
    //     $user = $request->user();
        
    //     //$tokenResult = $user->createToken('Personal Access Token');
    //     $token = $user->createToken('access_token')->accessToken;

    //   //  $token = $tokenResult->token;
    //     echo '<pre>';
    //     print_r($token);
    //     exit;
       
    //     if ($request->remember_me){
    //         $token->expires_at = Carbon::now()->addWeeks(1);
    //     }
    //     $token->save();

    //     $success['email']       =  $user->email;
    //     $success['name']        =  $user->name;
    //     $success['user_id']     =  $user->id;
    //     $success['token']       =  $tokenResult->accessToken;
    //     $success['expires_at']  =  Carbon::parse( $tokenResult->token->expires_at )->toDateTimeString();
    //     return response()->json(['success' => $success], $this->successStatus);
    // }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }


}
