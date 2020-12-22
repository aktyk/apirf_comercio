<?php

use Illuminate\Http\Request;

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

Route::group(["middleware" => "apikey.validate"], function () {
	Route::resource('users', 'User\UserController', ['except' => ['create', 'edit']]);
	Route::name('login')->post('login', 'User\UserController@login');

	Route::resource('accessprivileges', 'AccessPrivilegesController', ['except' => ['create', 'edit']]);
});
