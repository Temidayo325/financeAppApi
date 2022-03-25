<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Source;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Carbon\Carbon;
use App\Http\Resources\IncomeResource;
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
            $data = Income::select('money', 'source', 'created_at')
                            ->where('user_token', $request->user_id)
                            ->whereBetween('created_at', [Carbon::createFromDate(null, null, 1), Carbon::now()])
                            ->orderBy('id', 'desc')
                            ->get()
                            ->map(function($item){
                                return [
                                    'amount' => $item->money,
                                    'create_at' => Carbon::create($item->created_at)->diffForHumans(),
                                    'source' => $item->source
                                ];
            });

            // return  IncomeResource::collection($data);
            return response()->json([
                'status' => 1,
                'message' => "Income returned succesfully",
                'total' => $data->sum('amount'),
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
        if (JWTAuth::checkOrFail())
        {
            $validated = Validator::make($request->all(), [
            'amount' => 'required|numeric|min:3',
            'user_id' => 'required|bail|string',
            'source' => 'required|bail|exists:sources,source'
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
            'user_token' => $request->user_id,
            'source' => $request->source
        ]);
        if($income)
        {
                return response()->json([
                    'status' => 1,
                    'message'=> 'Income added Successfully',
                    // 'data' => Income::where('user_token', $request->user_id)->whereBetween('created_at', [Carbon::createFromDate(null, null, 1), Carbon::now()])->get()
                ]);
        }else{
                return response()->json([
                    'status' => 0,
                    'message'=> 'Unable to add income'
                ]) ;
        }
        }else{
             return response()->json([
                'status' => 0,
                'message' => 'Invalid user'
            ]);
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
        if (JWTAuth::checkOrFail())
        {
            return response()->json([
                    'status' => 1,
                    'message' => 'Retrieved successfully',
                    'data' => $income->select('source')->get()
                ]);
        }else{
             return response()->json([
                'status' => 0,
                'message' => 'Invalid user'
            ]);
        }
    }

     /**
     * Display the available sources.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function showSources(Request $request)
    {
        if (JWTAuth::checkOrFail())
        {
            return response()->json([
                    'status' => 1,
                    'message' => 'Retrieved successfully',
                    'data' => Source::select('source')->get()
                ]);
        }else{
             return response()->json([
                'status' => 0,
                'message' => 'Invalid user'
            ]);
        }
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
