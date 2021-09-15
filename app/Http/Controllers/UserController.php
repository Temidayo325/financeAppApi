<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function login(Request $request)
    {
    	$user = User::where('email', $request->email)->first();
    	if(!$user || Hash::check($request->password, $user->password))
    	{
    		return response([
				'message' => 'The credentials does not exit'
    		], 404);
    	}

    	$token = $user->createToken('my-app-token')->plainTextToken;

    	$response = [
    		'user' => $user,
    		'token' => $token
    	];

    	return response($response, 201);
    }

    public function register(Request $request)
    {
    	if (User::where('email', $request->email)->exists()) {
    		return response([
    			'message' => "User already exists"
    		], 303);
    	}else{
    		$hash = Hash::make("12345");
    		User::insert([
    			'name' => $request->name,
    			'email' => $request->email,
    			'password' => $hash
    		]);
    	
    		return response([
    			"message" => "registration successful",
    			"password" => $request->password
    		], 201);
    	}
    }
}
