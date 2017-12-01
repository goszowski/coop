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

Route::group(['middleware'=>['sessions', 'ajax_token'], 'namespace'=>'Api'], function() {
	Route::group(['prefix'=>'category', 'as'=>'category.'], function() {
    	Route::get('find-by-name', ['as'=>'find-by-name', 'uses'=>'CategoriesController@findByName']);
    });
});

// Route::group(['namespace'=>'Api', 'as'=>'api.'], function() {
//     Route::group(['prefix'=>'users', 'as'=>'users.'], function() {
//         Route::get('activate/{email}/{token}', ['as'=>'activate', 'uses'=>'UsersController@activate']);
//     });

    
// });

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });