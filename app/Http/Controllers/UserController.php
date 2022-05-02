<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Models\Demographic;
use App\Models\Verification;

use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\JWT;
use JWTAuth;
use App\Http\Resources\UserResource;

use App\Templates\Verify;
use Illuminate\Support\Facades\Mail;
use App\Services\Utility;
use App\Services\Email;
use App\Services\Sms;

use App\Mail\VerificationMail;
use App\Events\UserRegistered;
use App\Http\Resources\DemographicResource;

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
      $check = Validator::make($request->all(), [
          'email' => 'required|email|min:8|bail',
          'password' => 'required'
      ]);

      if($check->fails()){
          return response()->json([
              'status' => 0,
              'message' => $check->errors()->first()
            ]);
      }
      if ( $token = Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

         if ( Auth::user()->verification()->first()->isVerified == false) {
            return response([
                'message' => 'Oops! Seems You are not verified. Proceed to the verification page to verify your account',
                'status' => 2,
                'user_id' => Auth()->user()->user_token
            ]);
         }

            return new UserResource(Auth::user());

      }else{
            return response([
   				'message' => 'The credentials do not exist',
                'status' => 0
       		]);
      }

    }

    public function register(Request $request)
    {
      $check = Validator::make($request->all(), [
           'email' => 'email|required',
            'name' => 'required|string|max:100',
            'gender' => 'required|string|in:male,female',
            'password' => 'required|integer|min:4',
            'phoneNumber' => 'required|min:11|numeric'
      ]);

      if($check->fails()){
          return response()->json([
              'status' => 0,
              'message' => $check->errors()->first()
            ]);
      }
    	if ( User::where('email', $request->email)->exists() ) {
    		return response()->json([
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
            Auth::attempt(['email' => $request->email, 'password' => $request->password]);
            $sendMail = Mail::to($request->email)->send(new VerificationMail($user));
              //Send SMS

             // send Email and SMS Notification
       		return  new UserResource($user);
        }
    }

    public function autoVerify(Request $request)
    {
            $check = Validator::make($request->all(), [
                'user_id' => 'required|bail|string'
            ]);

            if($check->fails()){
                return response()->json([
                    'status' => 0,
                    'message' => $check->errors()->first()
                    ]);
            }
       $verify = Verification::where('user_token', $request->user_id)->first();
       if ( $verify) {
          $verify->isVerified = true;
          $verify->save();
          // $check = User::where('user_token', $request->user_id)->first();
          event( new UserRegistered(User::where('user_token', $request->user_id)->first()) );

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
            $check = Validator::make($request->all(), [
                'user_id' => 'required|bail|string',
                 'code' => 'required|numeric'
            ]);

            if($check->fails()){
                return response()->json([
                    'status' => 0,
                    'message' => $check->errors()->first()
               ]);
            }

            $check = User::where('user_token', $request->user_id)->first();
            if ( $check->verifyCode == $request->code) {
                $verify = Verification::where('user_token', $request->user_id)->first();

                if ($verify->isVerified) {
                     return response()->json([
                          'message' => "Account successfully initiated. Continue to change your password",
                          'status' => 1
                     ]);
                }
                $verify->isVerified  = true;
                $verify->save();
                event( new UserRegistered($check) );
                return response()->json([
                     'message' => "Hurray! Your Account has been verified. Continue to login to your account",
                     'status' => 1
                ]);

      }else{
         return response()->json([
           'message' => "Ooops! The passcode is incorrect",
           'status' => 0
         ]);
      }

    }

    // protected function createNewToken($token)
    // {
    //   return response()->json([
    //        'access_token' => $token,
    //        'token_type' => 'bearer',
    //        'expires_in' => auth()->factory()->getTTL() * 60,
    //        'status' => 1,
    //        'user' => auth()->user()
    //   ]);
    // }

    //  public function refresh()
    //  {
    //     return $this->createNewToken(auth()->refresh());
    //  }

     public function AddDemographicInformation(Request $request)
     {
         $check = Validator::make($request->all(), [
                'user_id' => 'string|required|bail|size:20',
                'category' => 'string|required|bail',
                'information' => 'string|required|bail'
            ]);

            if($check->fails()){
                return response()->json([
                    'status' => 0,
                    'message' => $check->errors()->first()
                    ]);
            }

        $user_exists = Demographic::where('user_token', $request->user_id)->first();
        if (!$user_exists) {
           // none has been added previously
           $info = Demographic::create([
             'user_token' => $request->user_id,
             $request->category => $request->information
          ]);

          return response()->json([
             'status' => 1,
             'message' => "Information added successfully",
             'data' => $info
          ])
          ;
        }else{
           // some might have been added previously
           $user = Demographic::where('user_token', $request->user_id)->first();
           $category = $request->category;
           $user->$category = $request->information;
           $user->save();


        //   return response()->json([
        //      'status' => 1,
        //      'message' => "Information added successfully",
        //      'data' => $user
        //   ]);
           return new DemographicResource($user);
        }
     }

     public function Logout(REQUEST $request)
     {
        // Invalidate the token
        JWTAuth::unsetToken();
        return response()->json([
           'status' => 0,
           'message' => "Logout successful"
        ]);
     }
  }
