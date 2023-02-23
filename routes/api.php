<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\TransaksiController;

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

Route::get('/getmember',[MemberController::class,'getmember']);
Route::get('/getmember/{id}',[MemberController::class,'pilihmember']);
Route::post('/createmember', [MemberController::class,'createmember']);
Route::put('/updatemember/{id}',[MemberController::class,'updatemember']);
Route::delete('/deletemember/{id}',[MemberController::class,'deletemember']);

Route::get('/getbarang',[BarangController::class,'getbarang']);
Route::get('/getbarang/{id}',[BarangController::class,'pilihbarang']);
Route::post('/createbarang',[BarangController::class,'createbarang']);
Route::put('/updatebarang/{id}',[BarangController::class,'updatebarang']);
Route::delete('/deletebarang/{id}',[BarangController::class,'deletebarang']);