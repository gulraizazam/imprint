<?php

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
Route::post('register','Api\RegisterController@signupProcess');
Route::post('login','Api\LoginController@processLogin');
Route::post('forget-password','Api\ForgetPasswordController@processPassword');
Route::post('verifycode','Api\EmailVerifyController@verifyUser');
Route::post('sendcode','Api\RegisterController@SendCode');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

