<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Verification;

use App\Services\Utility;

use App\Events\UserRegistered;

class UserController extends Controller
{
    public function login(Request $request)
    {
      $check = $request->validate([
         'email' => 'required|email|min:8|bail',
         'password' => 'required'
      ]);
    	$user = User::where('email', $request->email)->first();

    	if(!$user || Hash::check($request->password, $user->password) == false)
    	{
    		return response([
				'message' => 'The credentials do not exit',
           'status' => 0
    		]);
    	}

    	$token = $user->createToken('my-app-token')->plainTextToken;

    	$response = [
    		'user' => $user,
    		'token' => $token,
         'status' => 1
    	];

    	return response($response);
    }

    public function register(Request $request)
    {
      $check = $request->validate([
        'email' => 'email|required',
        'name' => 'required|string|max:100',
        'password' => 'required|string|min:4',
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

    public function verifyUser(Request $request)
    {
      $check = $request->validate([
         'user_id' => 'required|string|size:10|bail',
         'verificationCode' => 'required|size:6'
      ]);

      $user = User::where('user_token', $request->user_id)->first();
      if ($user->verify) {
         // code...
         if ($user->verify === $request->verificationCode) {
            $user->verifications()
            ->first()
            ->isVerified = true;
            $user->save();
         }
      }else{
         return response( [
            'status' => 1,
            'message' => "Account already verified"
         ], 201);
      }
   }
}
