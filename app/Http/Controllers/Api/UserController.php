<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class UserController extends Controller
{
    public $successStatus = 200;

    public function login(Request $request)
    {
        echo '<pre>';
        print_r($request); 
        exit;
        $request->validate([ 
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials)){
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        echo '<pre>';
        print_r($token);
        exit;
        if ($request->remember_me){
            $token->expires_at = Carbon::now()->addWeeks(1);
        }
        $token->save();

        $success['email']       =  $user->email;
        $success['name']        =  $user->name;
        $success['user_id']     =  $user->id;
        $success['token']       =  $tokenResult->accessToken;
        $success['expires_at']  =  Carbon::parse( $tokenResult->token->expires_at )->toDateTimeString();
        return response()->json(['success' => $success], $this->successStatus);
    }

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
