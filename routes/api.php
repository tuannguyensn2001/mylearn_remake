<?php

use App\Http\Controllers\API\CourseController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'],function(){
    Route::get('/courses',[CourseController::class,'index']);
    Route::get('/course/{slug}',[\App\Http\Controllers\API\LessonController::class,'index']);
    Route::get('/lesson/show/{course}/{lesson}',[\App\Http\Controllers\API\LessonController::class,'show']);


    Route::post('/auth/register',[\App\Http\Controllers\API\AuthController::class,'register']);
    Route::post('/auth/login',[\App\Http\Controllers\API\AuthController::class,'login']);

    Route::post('/auth/refresh',[\App\Http\Controllers\API\AuthController::class,'refresh']);



    Route::group(['middleware' => 'jwt'],function (){
        Route::post('/auth/me',[\App\Http\Controllers\API\AuthController::class,'me']);

        Route::get('/cart',[\App\Http\Controllers\API\CartController::class,'index']);
        Route::post('/cart',[\App\Http\Controllers\API\CartController::class,'store']);
        Route::delete('/cart/{id}',[\App\Http\Controllers\API\CartController::class,'destroy']);
        Route::post('/cart/buy',[\App\Http\Controllers\API\CartController::class,'buyCourse']);
    });
});
