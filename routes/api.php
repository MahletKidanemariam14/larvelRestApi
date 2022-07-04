<?php

use App\Http\Controllers\Api\employeecontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::get('employee', [employeeController::class, 'index']);
Route::post('employee/add', [employeeController::class, 'store']);
Route::put('employee/{id}/update', [employeeController::class, 'update']);
Route::delete('employee/{id}/delete', [employeeController::class, 'destroy']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

