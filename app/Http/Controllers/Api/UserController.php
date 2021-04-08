<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Model\Appointment;
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
            'submit_demand' => $submit_demand

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
