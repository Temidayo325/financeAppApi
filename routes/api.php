<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ExpenseController;
use App\Models\Expense;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("tryout", [CreateAccount::class, 'tryout']);

Route::post("login", [UserController::class, 'login']);

Route::post("register", [UserController::class, 'register']);

Route::post("create", [ExpenseController::class, 'create']);

Route::post("sortByDateBetweenNowAndDate", [ExpenseController::class, 'sortByDateBetweenNowAndDate']);
Route::post("sortbetweenTwoDates", [ExpenseController::class, 'sortbetweenTwoDates']);
