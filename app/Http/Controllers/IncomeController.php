<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Carbon\Carbon;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (JWTAuth::checkOrFail())
        {
            $validated = Validator::make($request->all(),[
                'user_id' => 'required|bail|string|exists:users,user_token'
            ]);

            if ($validated->fails())
            {
                return response()->json([
                    'status' => 0,
                    'message' => 'User is not recognized'
                ]);
            }
            $data = Income::where('user_token', $request->user_id)->whereBetween('created_at', [Carbon::createFromDate(null, null, 1), Carbon::now()])->get();
            return response()->json([
                    'status' => 1,
                    'message' => 'Request Successful',
                    'data' => $data 
            ]);
        }else{
            return response()->json([
                'status' => 0,
                'message' => 'Invalid user'
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'amount' => 'required|numeric|min:3',
            'user_id' => 'required|bail|string'
        ]);

        if ($validated->fails())
        {
            return response()->json([
                'status' => 0,
                'massage' =>$validated->errors()->first(),

            ]);
        }
        $income = Income::create([
            'money' => $request->amount,
            'user_token' => $request->user_id
        ]);
        if($income)
        {
                return response()->json([
                    'status' => 1,
                    'message'=> 'Income added Successfully',
                    'data' => Income::where('user_token', $request->user_id)->whereBetween('created_at', [Carbon::createFromDate(null, null, 1), Carbon::now()])->get()
                ]);
        }else{
                return response()->json([
                    'status' => 0,
                    'message'=> 'Unable to add income'
                ]) ;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function show(Income $income)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function edit(Income $income)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Income $income)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function destroy(Income $income)
    {

    }
}