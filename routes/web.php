<?php

use App\Http\Controllers\employeeController;
use App\Http\Controllers\positionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/employe/edit/{id}', function () {
    return view('edit');
});
Route::get('/position', function () {
    return view('positionTable');
});
Route::get('/create/position', function () {
    return view('createPosition');
});
Route::get('/create/employe', function () {
    return view('createEmploye');
});


Route::get('/api/position',[positionController::class,'get']);
Route::post('/api/position',[positionController::class,'store']);
Route::delete('/api/position/{id}',[positionController::class,'delete']);

Route::get('/api/employee',[employeeController::class,'joinData']);
Route::get('/api/employee/{id}',[employeeController::class,'getById']);
Route::post('/api/employee',[employeeController::class,'store']);
Route::put('/api/employee/{id}',[employeeController::class,'update']);
Route::delete('/api/employee/{id}',[employeeController::class,'delete']);