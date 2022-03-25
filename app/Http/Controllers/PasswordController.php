<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Utility;
use App\Events\ResetPassword;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{
    public function reset(Request $request)
    {
      $check = $request->validate([
         'email' => 'required|bail|email'
      ]);
      $user = User::where('email', $request->email)->first();
      if ( $user ) {
         // code...
            $code = Utility::generateInteger(6);
            $user->verifyCode = $code;
            $user->save();
            // $user = User::where('email', $request->email)->first();

            event( new ResetPassword($user) );

            return response()->json([
               'status' => 1,
               'message' => "Verification sent"
            ]);
      }else{
         return response()->json([
            'status' => 0,
            'message' => "Email is not recognized"
         ]);
      }
    }

    public function changePassword(Request $request)
    {
          $validate = $request->validate([
             'password' => 'required',
             'password2' => 'required',
             'user_id' => 'required|email'
          ]);
           $user = User::where('user_token', $request->user_id)->first();
           if ($user) {
              // code...
               if ($request->password === $request->password2) {
                     $user->password = Hash::make($request->password);
                     $user->save();
                     return response()->json([
                          'status' => 1,
                          'message' => "Password changed successfully"
                     ]);
               }else{
                  return response()->json([
                       'status' => 0,
                       'message' => "Passwords do not match"
                 ]);
               }
           }else{
             return response()->json([
                'status' => 0,
                'message' => "Email is invalid"
             ]);
          }
    }
}
