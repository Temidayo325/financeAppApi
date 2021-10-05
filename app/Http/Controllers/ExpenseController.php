<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Expense;
use App\Models\User;

use Carbon\Carbon;

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

    public function index(Request $request)
    {
        $check = $request->validate([
          'user_id' => 'required|string|max:10|min:10'
        ]);
        // $token = $request->bearerToken();
        // if ($request->bearerToken() !== '') {
          $expense = Expense::where('user_token', $request->user_id)->get()->groupBy('category_id');
          return response()->json([
            'message' => "Queried successfully",
            'status' => 1,
            'data' => $expense
          ]);
        // }
    }

    public function readCategory(Request $request)
    {
        $check = $request->validate([
          'user_id' => 'required|string|max:10|min:10',
          'category' => 'required|string'
        ]);
        $category_id = Category::where('category', strtolower($request->category))->first();
        $expense = Expense::where('user_token', $request->user_id)->where('category_id', $category_id->id)->get();
        return response()->json([
          'message' => 'Queried successfully',
          'status' => 1,
          'data' => $expense
        ]);
    }

    public function sortByTimelineFromNow(Request $request)
    {
        $check = $request->validate([
            'user_id' => 'required|string|max:10|min:10',
            'category' => 'required|max:1|min:1',
            'date' => 'required'
        ]);
        $date = new Carbon($request->date);
        $check = Expense::select('category_id', 'amount','created_at')
        ->where('user_token', 'ce7ajg9tus')
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
}
