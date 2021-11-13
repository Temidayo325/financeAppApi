<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PasswordController;
use App\Models\Expense;

use App\Http\Middleware\JwtAuth;
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

// Route::get("tryout", [CreateAccount::class, 'tryout']);
// Route::withoutMiddleware([JwtAuth::class])->group(function () {
   Route::post("/login", [UserController::class, 'login']);
   Route::post("/register", [UserController::class, 'register']);
   Route::post("/autoVerify", [UserController::class, "autoVerify"]);
   Route::post("/verifyUser", [UserController::class, 'verifyUser']);
   Route::post("/reset", [PasswordController::class, 'reset']);
// });

// All routes require Authorization token after login

Route::group([
   'middleware' => 'jwt.auth'
], function ($router){
   Route::post("/changePassword", [PasswordController::class, 'changePassword']);
   Route::post("/ExpenseWithCard", [ExpenseController::class, 'ExpenseWithCard']);
   Route::post("/ExpenseWithCash", [ExpenseController::class, 'ExpenseWithCash']);
   Route::get("/sortByDateBetweenNowAndDate", [ExpenseController::class, 'sortByDateBetweenNowAndDate']);
   Route::get("/sortbetweenTwoDates", [ExpenseController::class, 'sortbetweenTwoDates']);
   Route::post("/initializeWithNewVendor", [PaymentController::class, 'initializeWithNewVendor']);
   Route::get("/getExpense", [ExpenseController::class, 'index']);
   Route::get("/readCategory", [ExpenseController::class, 'readCategory']);
});

Route::fallback(function(){
    return response()->json(['message' => 'Not Found!'], 404);
});

Route::fallback(function(){
    return response()->json(['message' => 'Unauthorized access!'], 401);
});
