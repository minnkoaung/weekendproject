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

<<<<<<< HEAD
Route::group(['middleware' => 'auth'], function () {
	//    Route::get('/link1', function ()    {
	//        // Uses Auth Middleware
	//    });

	//Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
	#adminlte_routes
=======
Route::group(['middleware' => 'auth','prefix' => 'backend'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

	Route::get('home', 'HomeController@index')->name('home');
	
	Route::get("roles", 'RoleController@index')->name("roles.index");
	Route::get("roles/data", 'RoleController@data')->name("roles.data");

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
>>>>>>> heinhtut
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

