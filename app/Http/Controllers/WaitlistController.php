<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Models\Waitlist;
use App\Mail\AddtoWaitlist;
use Illuminate\Support\Facades\Mail;
use App\Services\Email;

class WaitlistController extends Controller
{
    public function register(Request $request)
    {
         $validate = Validator::make($request->all(), [
              'name' => 'required|string',
              'mail' => 'required|email'
         ]);

         if ($validate->fails()) {
              return response()->json([
                   'status' => 0,
                   'message' => $validate->errors()->first()
              ]);
         }
         if (Waitlist::where('email', $request->mail)->exists())
         {
              // code...
              return response()->json([
                  'status' => 0,
                  'message' => "You have been added to the waiting list"
             ]);
          }
          Waitlist::create([
               'name' => $request->name,
               'email' => $request->mail
          ]);
          Mail::to($request->mail)->send(new AddtoWaitlist());
          Email::addToList('Waitlist', $request->mail);

         return response()->json([
              'status' => 1,
              'message' => "You have been added to the waitlist"
         ]);
    }
}
