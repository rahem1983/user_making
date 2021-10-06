<?php

use Illuminate\Support\Facades\Route;


//use App\Http\Controllers\UserInfoForm;
use App\Http\Controllers\Profile;

use App\Http\Controllers\userinfo;
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

// Route::get('/{name}', function ($name) {
//     return view('welcome', ['id'=> $name]);
// });

// Route::get('UserCall', [userinfo::class, 'UserCall']);

//Route::post('setuserinfo', [UserInfoForm::class, 'SetUserData']);

Route::get('login', function(){
	if (session()->has('username')) {

		return redirect('api/profile');
	}

		return view('LoginForm');

});

// Route::get('profile', [Profile::class, 'profile']);

// Route::get('logout', function(){
// 	if (session()->has('username')) {

// 		session()->pull('username');
// 	}
// 	return redirect('login');
// });



