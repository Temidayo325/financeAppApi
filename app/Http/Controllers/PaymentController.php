<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\Paystack;
use App\Services\Sale;
use App\Services\ThirdParty;

use App\Models\Bank;
use App\Models\User;

class PaymentController extends Controller
{
   public function initializeWithNewVendor(Request $request)
   {
      $check = $request->validate([
            'user_id' => 'required|string',
            'name' => 'required|string|min:3',
            'amount' => 'required|numeric',
            'account' => 'required|numeric|min:10',
            'bank' => 'required|string'
      ]);

      // check that the account actually exists
      $user = User::where('user_token', $request->user_id)->first();
      //retrieve bank_code from bank provided in the request
      $bank_code = Bank::select('bank_code')->where('name', $request->bank)->first();
      //Verify the account number
      $verify = Paystack::VerifyAccountNumber(['account_number' => $request->account, 'bank_code' => $bank_code->bank_code]);
      if ($verify->status === true) {
         //create new vendow
         ThirdParty::registerNewVendor((object) ['name' => $request->name, 'account_number' => $request->account, 'bank_code' => $bank_code->bank_code]);
         // initialize the transaction
         $initialize = Paystack::InitializePayment( (object) ['email' => $user->email, 'amount' => $request->amount]);
         //create new Transaction
         Sale::initializeTransaction( (object) [
            'origin' => $user->user_token,
            'destination' => $request->account,
            'reference' => $initialize->data->reference,
            'amount' => $request->amount
         ]);
         return response()->json([
            'payment' => $initialize,
            'account' => $verify
         ]);
      }else{
         return response()->json([
            'status' => 0,
            'message' => "The account number is not valid"
         ]);
      }
   }


}
