<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmployeeController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [LoginController::class, 'register']);
Route::get('/getUser', [LoginController::class, 'getActualUser']);
Route::middleware('auth')->post('/logout', [LoginController::class, 'logout']);

Route::middleware('auth')->get('/employee', [EmployeeController::class, 'index']);
Route::post('/addEmployee', [EmployeeController::class, 'store']);
Route::get('/oneEmployee', [EmployeeController::class, 'show']);
Route::put('/updateEmployee', [EmployeeController::class, 'update']);
Route::delete('/deleteEmployee', [EmployeeController::class, 'destroy']);