<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LiquidController;
use App\Http\Controllers\PenilaianController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::get('/test', [ApiController::class, 'test']);
Route::post('/test', function (Request $request) {
    return response()->json($request->all(), 200);
});


Route::post('login', [ApiController::class, 'login']);
Route::post('register', [ApiController::class, 'register']);

Route::group(['middleware' => 'auth:api'], function () {
    // Auth
    Route::get('user/detail', [ApiController::class, 'user']);
    Route::get('logout', [ApiController::class, 'logout']);


    // custom kategori
    Route::post('categories', [CategoryController::class, 'create']);
    Route::get('categories', [CategoryController::class, 'read']);
    Route::get('categories/{category}', [CategoryController::class, 'get']);
    Route::put('categories/{category}', [CategoryController::class, 'update']);
    Route::delete('categories/{category}', [CategoryController::class, 'delete']);


    // liquid
    Route::get('liquid', [LiquidController::class, 'createRoom']);
    Route::put('liquid', [LiquidController::class, 'closeRoom']);



    // penilaian
    Route::post('cek/room', [PenilaianController::class, 'cekRoom']);
    Route::post('penilaian', [PenilaianController::class, 'create']);
}); 


// Route::post('/login', [ApiController::class, 'login']);
// Route::post('/register', [ApiController::class, 'register']);