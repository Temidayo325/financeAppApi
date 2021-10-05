<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use App\Services\Utility;

class UserController extends Controller
{
    public function login(Request $request)
    {
    	$user = User::where('email', $request->email)->first();
      // $hash = ;
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
        'password' => 'required|string|min:4'
      ]);

    	if (User::where('email', $request->email)->exists()) {
    		return response([
    			'message' => "User already exists",
          'status' => 0
    		]);
    	}else{
    		// $hash = Hash::make("12345");
    		User::create([
    			'name' => $request->name,
    			'email' => $request->email,
          'user_token' => Utility::generator(10),
    			'password' => Hash::make($request->password)

    		]);

    		return response([
    			"message" => "registration successful",
    			"status" => 1
    		], 201);
    	}
    }
}
