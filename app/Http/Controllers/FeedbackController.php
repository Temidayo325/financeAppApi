<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Mail\VerificationMail;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{
    public function createFeedBack(REQUEST $request)
    {
         $check = $request->validate([
            'user_id' => 'required|string',
            'feedback' => 'required|string|min:5'
         ]);
         $feedback = Feedback::create([
            'user_token' => $request->user_id,
            'feedback' => $request->feedback,
            'status' => 'Open'
         ]);

         if ($feedback) {
            return response()->json([
               'status' => 1,
               'message' => "Thank you for your feedback, we would get back to you soon"
            ]);
         }else{
            return response()->json([
               'status' => 0,
               'message' => "Unable to send feedback"
            ]);
         }

    }

    public function testEmail(Request $request)
    {
         $user = (object) ['name' => $request->name, 'verifyCode' => 010101];
         $send = Mail::to($request->email)->send(new VerificationMail($user));
         return $send;
    }
}
