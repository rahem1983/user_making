<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userinfo;
use App\Http\Controllers\PostCheck;
use App\Http\Controllers\UserInfoForm;
use App\Http\Controllers\Profile;

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




//Route::group(['middleware' => ['web']], function () {
    Route::get('UserCall', [userinfo::class, 'UserCall']);

Route::post('postcheck',[PostCheck::class, 'postcheck']);

Route::post('setuserinfo', [UserInfoForm::class, 'SetUserData']);

Route::get('delete/{id}',[userinfo::class, 'delete']);

Route::get('profile', [Profile::class, 'profile']);

Route::get('logout', function(){
    if (session()->has('username')) {

        session()->pull('username');
    }
    return redirect('login');
});

Route::put('update', [userinfo::class, 'update']);

// Route::post('search', [userinfo::class, 'searchvalue']);

Route::post('search', [userinfo::class, 'search']);
//});