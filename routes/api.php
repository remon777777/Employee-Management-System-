<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});
Route::middleware(['api'])->group(function () {
    Route::get('/department', [DepartmentController::class, 'index']);
    Route::post('/department', [DepartmentController::class, 'store']);
    Route::get('/department/{depId}', [DepartmentController::class], 'show');
    Route::put('/department/{depId}', [DepartmentController::class], 'update');
    Route::delete('/department/{depId}', [DepartmentController::class], 'destroy');
});
Route::middleware(['api'])->group(function () {
    Route::get('/employee', [EmployeeController::class, 'index']);
    Route::post('/employee', [EmployeeController::class, 'store']);
    Route::get('/employee/{empId}', [EmployeeController::class], 'show');
    Route::put('/employee/{empId}', [EmployeeController::class], 'update');
    Route::delete('/employee/{empId}', [EmployeeController::class], 'destroy');
});
