<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Expense;
use App\Models\User;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

use App\Services\Sale;
use App\Services\Paystack;
use App\Services\ThirdParty;
use App\Services\AuthorizationService;
use App\Services\ExpenseService;

use Carbon\Carbon;

class ExpenseController extends Controller
{
    public function ExpenseWithCard(Request $request)
    {
        $check = $request->validate([
          'reference' => 'required'
        ]);

        //get the category_id
        $category_id = Category::where('category', $request->category)->first()->id;
        //verify the payment
        $verify = Paystack::VerifyPayment($request->reference);
        if ($verify->data->status == 'success') {
                // create an Expense
                  ExpenseService::Create($request);
                  //Update the transaction
                   Sale::UpdateSale($request->reference);
                   //create reusable detail for the user
                   AuthorizationService::Create((object) ['code' => $verify->data->authorization->authorization_code, 'last4' => $verify->data->authorization->last4, 'card_type' => $verify->data->authorization->card_type, 'user_id' => $request->user_id]);
                   // Transfer Money to Vendor
                  return response()->json([
                    'message' => 'Expense created',
                    'status' => 1
                  ]);
                return response()->json([
                  'message' => 'Unable to create Record',
                  'status' => 0,
                  'error' => $e
                ]);
        }else{
           return response()->json([
             "status" => 0,
             "message" => $verify->message
          ]);
        }

    }

    public function ExpenseWithCash(Request $request)
    {
      if (JWTAuth::checkOrFail()) {
         if (ExpenseService::Create($request)) {
            return response()->json([
               'status' => 1,
               'message' => "Expense recorded successfully"
            ]);
         }else{
            return response()->json([
               'status' => 0,
               'message' => "Unable to create expense"
            ]);
         }
      }else{
         return response()->json([
            'status' => 0,
            "message" => "Invalid user"
         ]);
      }

    }
    //This method is not completed
    public function ExpenseWithCharge(Request $request)
     {
    //   $check = $request->validate([
    //      'user_id' => 'string|required',
    //      'account_number' => 'integer|required|max:10|min:10',
    //      'amount' => 'integer|required'
    //   ]);
    //
    //   //Charge the User
    //   $details = AuthorizationService::GetChargeDetails($request->user_id);
    //   $charge_user = AuthorizationService::Charge( (object) ['email' => $request->email, 'amount' => $request->amount, 'code' => $details->code]);
    //   //Create the expense
    //   //Initiate Transfer
    //   //check if the vendor already exists else i'll register as a new vendor
    //   if (ThirdParty::IfVendorExists($request->account_number)) {
    //      // code...Vendor already exists(
    //   }else{
    //      // vendor does not exist
    //      if (ThirdParty::registerNewVendor($data)) {
    //         // code
    //      }else{
    //         return response()->json([
    //            'status' => 0,
    //            'message' => "Unable to register the vendor"
    //         ]);
    //      }
    //   }
    }
    public function index(Request $request)
    {
        if (JWTAuth::checkOrFail()) {
           $check = $request->validate([
             'user_id' => 'required|string'
           ]);

             $expense = Expense::where('user_token', $request->user_id)->get()->groupBy('category_id');
            if ($expense) {
               return response()->json([
                 'message' => "Queried successfully",
                 'status' => 1,
                 'data' => $expense
               ]);
            }else{
               return response()->json([
                  'status' => 0,
                  'message' => "You do not have any expenses recorded"
               ]);
            }
        }else{
           return response()->json([
             'status' => 0,
             'message' => "Invalid user"
          ]);
        }
    }

    public function readCategory(Request $request)
    {
        $check = $request->validate([
          'user_id' => 'required|string',
          'category' => 'required|string'
        ]);
        $category_id = Category::where('category', strtolower($request->category))->first();
        $expense = Expense::where('user_token', $request->user_id)->where('category_id', $category_id->id)->get();
        if ($expense) {
           return response()->json([
             'message' => 'Queried successfully',
             'status' => 1,
             'data' => $expense
           ]);
        }else{
           return response()->json([
           'message' => 'No expense with this category',
           'status' => 0,
           // 'data' => $expense
          ]);
        }
    }

    public function sortByDateBetweenNowAndDate(Request $request)
    {
        $check = $request->validate([
            'user_id' => 'required|string',
            'date' => 'required|date'
        ]);
           $date = new Carbon($request->date);
           $check = Expense::select('category_id', 'amount','created_at')
           ->where('user_token', $request->user_id)
           ->whereBetween('created_at', [$date, Carbon::now()])
           ->orderBy('category_id')
           ->get()
           ->map(function ($item){
           	    return [
                    'category_id' => $item->category_id,
                    'amount' => $item->amount,
                    'created' => Carbon::parse($item->created_at)->diffForHumans(),
               ];
           });

           return response()->json([
             'data' => $check
           ]);
    }

    public function sortbetweenTwoDates(Request $request)
    {
         $checked = $request->validate([
             'user_id' => 'required|string',
             'date1' => 'required|date',
             'date2' => 'required|date'
         ]);

        $date = new Carbon($request->date1);
        $date2 = new Carbon($request->date2);
        $check = Expense::select('category_id', 'amount','created_at')
        ->where('user_token', $request->user_id)
        ->whereBetween('created_at', [$date, $date2])
        ->orderBy('category_id')
        ->get();
        if ($check !== null || count($check) == 0) {
           if (count($check) > 1) {
             // code...
             $modify =  $check->map(function ($item){
                return [
                     'category_id' => $item->category_id,
                     'amount' => $item->amount,
                     'created' => Carbon::parse($item->created_at)->diffForHumans(),
                   ];
             });
             return response()->json([
                'data' => $modify,
                'status' => 1
             ]);
           }else{
             return response()->json([
                'data' => $check,
                'status' => 1
             ]);
           }
        }else{
           return response()->json([
             'status' => 0,
             'message' => "Ooops! No expenses for the time period selected"
          ]);
        }

   }
}
