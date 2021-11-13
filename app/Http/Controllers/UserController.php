<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Verification;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

use App\Services\Utility;

use App\Events\UserRegistered;

class UserController extends Controller
{
   /**
    * Create a new AuthController instance.
    *
    * @return void
    */
    public function __construct() {
      // $this->middleware('auth:api', ['except' => ['login', 'register', 'autoVerify', 'verifyUser']]);
    }


    public function login(Request $request)
    {
      $check = $request->validate([
         'email' => 'required|email|min:8|bail',
         'password' => 'required'
      ]);

      if ( $token = Auth::attempt(['email' => $request->email, 'password' => $request->password]) ) {

         if ( Auth::user()->verification()->first()->isVerified == false) {
            return response([
               'message' => 'Oops! Seems You are not verified. Proceed to the verification page to verify your account',
              'status' => 2
            ]);
         }
         return response()->json([
            'user' =>  Auth::user(),
            'token' => JWTAuth::fromUser(Auth::user()),
            'status' => 1
         ]);
         // return $this->createNewToken($token);
      }else{
            return response([
   				'message' => 'The credentials do not exist',
              'status' => 0
       		]);
      }

    }

    public function register(Request $request)
    {
      $check = $request->validate([
        'email' => 'email|required',
        'name' => 'required|string|max:100',
        'gender' => 'required|string|max:6|min:4',
        'password' => 'required|integer|numeric|min:4',
        'phoneNumber' => 'required|min:11|max:14'
      ]);

    	if ( User::where('email', $request->email)->exists() ) {
    		return response([
    			'message' => "User already exists",
           'status' => 0
    		]);
    	}else{
    		   $token = Utility::generateInteger();
            $user_token = Utility::generator();
    		   $user = User::create([
       			'name' => $request->name,
       			'email' => $request->email,
               'user_token' => $user_token,
       			'password' => Hash::make($request->password),
               'phone' => $request->phoneNumber,
               'gender' => $request->gender,
               'verifyCode' => $token
       		]);

            $unverified = Verification::create([
               'user_token' => $user_token,
               'isVerified' => false
            ]);

            event( new UserRegistered($user) );
         // send Email and SMS Notification
       		return response([
       			"message" => "registration successful",
       			"status" => 1
       		], 201);
    	}
    }

    public function autoVerify(Request $request)
    {
       $validate = $request->validate([
          'user_id' => 'required|bail|string'
       ]);
       $verify = Verification::where('user_token', $request->user_id)->first();
       if ( $verify) {
          $verify->isVerified = true;
          $verify->save();
          return response()->json([
             'message' => "Hurray!! Account verified. Proceed to login to your account",
             'status' => 1
          ]);
       }else{
          return response()->json([
             'message' => "Ooops! Unable to verify your Account",
             'user' => $verify,
             'status' => 0
          ]);
       }
    }

    public function verifyUser(Request $request)
    {
      $validate = $request->validate([
         'user_id' => 'required|bail|string',
         'code' => 'required|numeric|integer'
      ]);
      $check = User::where('user_token', $request->user_id)->first();
      if ( $check->verifyCode == $request->code) {
         $verify = Verification::where('user_token', $request->user_id)->first();
         $verify->isVerified = true;
         $verify->save();
         return response()->json([
           'message' => "Hurray!! Account verified. Proceed to login to your account",
           'status' => 1
         ]);
      }else{
         return response()->json([
           'message' => "Ooops! The passcode is incorrect",
           'status' => 0
         ]);
      }

    }

    protected function createNewToken($token)
    {
      return response()->json([
           'access_token' => $token,
           'token_type' => 'bearer',
           'expires_in' => auth()->factory()->getTTL() * 60,
           'status' => 1,
           'user' => auth()->user()
      ]);
    }

     public function refresh()
     {
        return $this->createNewToken(auth()->refresh());
     }
}
