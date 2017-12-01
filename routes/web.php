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

Auth::routes();

Route::get('/', 'HomeController@index');

Route::group(['middleware'=>['auth']], function() {

    Route::group(['middleware'=>['api_token'], 'namespace'=>'Api', 'as'=>'api.'], function() {
        Route::group(['prefix'=>'category', 'as'=>'category.'], function() {
            Route::get('find-by-name', ['as'=>'find-by-name', 'uses'=>'CategoriesController@findByName']);
        });
    });

    Route::group(['prefix'=>'admin'], function() {
        Route::get('/', 'Admin\AdminController@index');
        Route::get('/give-role-permissions', 'Admin\AdminController@getGiveRolePermissions');
        Route::post('/give-role-permissions', 'Admin\AdminController@postGiveRolePermissions');
        Route::resource('/roles', 'Admin\RolesController');
        Route::resource('/permissions', 'Admin\PermissionsController');
        Route::resource('/users', 'Admin\UsersController');
        Route::get('/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator']);
        Route::post('/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator']);
    });
    
});
Route::resource('admin/categories', 'Admin\\CategoriesController');