<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::get('/', 'SearchController@index');
Route::resource('search', 'SearchController');
Route::auth();

//Route::get('admin', 'HomeController@index');
Route::get('user/activation/{token}', 'Auth\AuthController@userActivation');
Route::get('/home', 'HomeController@index');
// Admin area
Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
   
    Route::get('/', 'HomeController@index');
    Route::resource('/discrepancy', 'f_admin\DiscrepancyController');
    Route::resource('/hearing', 'f_admin\HearingController');
    Route::resource('/office', 'f_admin\OfficeController');
    Route::resource('/report', 'f_admin\ReportController');
   
    Route::resource('/profile', 'f_admin\ProfileController');
    
    Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function(){
        Route::resource('/users', 'f_admin\UsersController');
    });
   
});
