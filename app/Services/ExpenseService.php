<?php

namespace App\Services;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Expense;
use App\Models\Category;
/**
 *
 */
class ExpenseService
{

   public static function Create(Request $request):bool
   {
                $check = Validator::make($request->all(), [
                        'user_id' => 'required|string',
                        'amount' => 'required|integer',
                        'category' => 'required|string'
                ]);

                if($check->fails()){
                    return response()->json([
                        'status' => 0,
                        'message' => $check->errors()->first()
                        ]);
                }
                $expense = Expense::create([
                    'user_token' => $request->user_id,
                    'amount' => $request->amount,
                    'category_id' => Category::where('category', $request->category)->first()->id
                ]);

                return ($expense != null) ? true : false;
   }
}