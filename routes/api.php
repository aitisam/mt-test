<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\CustomerController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

 
Route::get('/employee/most_valuable_sales/', [EmployeeController::class, 'most_valuable_sales']);

Route::get('/team/ranks/', [TeamController::class, 'calculate_ranks']);

Route::get('/customer/by_spent/', [CustomerController::class, 'high_spent']);
Route::get('/customer/order_count/', [CustomerController::class, 'with_most_order_count']);