<?php

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
	return view('welcome');
});

Route::group(['middleware' => 'auth', 'prefix' => 'backend'], function () {
	//    Route::get('/link1', function ()    {
	//        // Uses Auth Middleware
	//    });

	Route::get('home', 'HomeController@index')->name('home');
	Route::get("roles", 'RoleController@index')->name("roles.index");
    Route::get("roles/create", 'RoleController@create')->name('roles.create');
    Route::get("roles/{id}/edit", 'RoleController@edit')->name('roles.edit');
    Route::get("roles/delete/{id}", 'RoleController@destroy')->name('roles.delete');
    Route::post("roles/store", 'RoleController@store')->name('roles.store');
    Route::patch("roles/update/{id}", 'RoleController@update')->name('roles.update');
    Route::get("roles/data", 'RoleController@data')->name("roles.data");

    Route::get('users','UserController@index')->name("users.index");
    Route::get("users/create", 'UserController@create')->name('users.create');
    Route::get("users/data", 'UserController@data')->name("users.data");
    Route::post("users/store",'UserController@store')->name("users.store");
    Route::get('users/{id}/edit',"UserController@edit")->name('users.edit');


	//Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
	#adminlte_routes
});

// Auth::routes();

// Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
// Route::post('login', 'Auth\LoginController@login');
// Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Route::group(['prefix' => 'backend'], function () {
// 	Route::get('home', 'HomeController@index')->name('home');

// 	Route::get("roles", 'RoleController@index')->name("roles.index");
// 	Route::get("roles/data", 'RoleController@data')->name("roles.data");
// });
