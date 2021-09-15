<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreateAccount extends Controller
{
    public function tryout()
    {
    	return response()->json([
    		'email' => 'Temi325@gmail.com',
    		'account' => 'My Account'
    	]);	
    }
}
