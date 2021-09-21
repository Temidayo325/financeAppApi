<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Expense;
use App\Models\User;

class ExpenseController extends Controller
{
    public function create(Request $request)
    {
        $check = $request->validate([
          'user_id' => 'required|string|max:10|min:10',
          'category' => 'required|string',
          'amount' => 'required|integer'
        ]);

        //get the category_id
        $category_id = Category::where('category', $request->category)->first()->id;
        //save the request in the expense column
        try {
            Expense::create([
              'user_token' => $request->user_id,
              'amount' => $request->amount,
              'category_id' => Category::where('category', $request->category)->first()->id
            ]);

            return response()->json([
              'message' => 'Record created successfully',
              'status' => 1
            ]);
        } catch (\Exception $e) {
          return response()->json([
            'message' => 'Unable to create Record',
            'status' => 0,
            'error' => $e
          ]);
        }

    }

    public function read(Request $request)
    {
        $check = $request->validate([
          'user_id' => 'required|string|max:10|min:10',
          // 'category' => 'required|string'
        ]);

        $category_id = Category::where('category', strtolower($request->category))->first();
        if ($category_id !== null) {
          // code...
          $expense = Expense::where('user_token', $request->user_id)->where('category_id', $category_id->id)->get();
          return response()->json([
            'message' => 'Queried successfully',
            'status' => 1,
            'data' => $expense
          ]);
        }else{
          $expense = Expense::where('user_token', $request->user_id)->get()->groupBy('category_id');
          return response()->json([
            'message' => "Queried successfully",
            'status' => 1,
            'data' => $expense
          ]);
        }
    }
}
