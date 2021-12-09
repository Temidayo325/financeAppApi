<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

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
               'message' => "Feedback taken successfully"
            ]);
         }else{
            return response()->json([
               'status' => 0,
               'message' => "Unable to take feedback"
            ]);
         }

    }
}
