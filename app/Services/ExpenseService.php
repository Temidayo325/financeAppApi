<?php

namespace App\Services;


use Illuminate\Http\Request;

use App\Models\Expense;
use App\Models\Category;
/**
 *
 */
class ExpenseService
{

   public static function Create(Request $request):bool
   {
      $check = $request->validate([
        'user_id' => 'required|string',
        'amount' => 'required|integer',
        'category' => 'required|string'
      ]);

      $expense = Expense::create([
        'user_token' => $request->user_id,
        'amount' => $request->amount,
        'category_id' => Category::where('category', $request->category)->first()->id
      ]);

      return ($expense != null) ? true : false;
   }
}
