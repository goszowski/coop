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

Route::get('login', [
  'middleware' => ['doNotCacheResponse'],
  'as' => 'login',
  'uses' => 'Auth\LoginController@showLoginForm',
]);


    Route::post('login', [
      'as' => '',
      'uses' => 'Auth\LoginController@login',
      'middleware' => 'doNotCacheResponse',
    ]);
    Route::post('logout', [
      'as' => 'logout',
      'uses' => 'Auth\LoginController@logout',
      'middleware' => 'doNotCacheResponse',
    ]);

    // Password Reset Routes...
    Route::post('password/email', [
      'as' => 'password.email',
      'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
    ]);
    Route::get('password/reset', [
      'as' => 'password.request',
      'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
    ]);
    Route::post('password/reset', [
      'as' => '',
      'uses' => 'Auth\ResetPasswordController@reset'
    ]);
    Route::get('password/reset/{token}', [
      'as' => 'password.reset',
      'uses' => 'Auth\ResetPasswordController@showResetForm'
    ]);

    // Registration Routes...
    Route::get('register', [
      'as' => 'register',
      'uses' => 'Auth\RegisterController@showRegistrationForm'
    ]);
    Route::post('register', [
      'as' => '',
      'uses' => 'Auth\RegisterController@register'
    ]);


Route::get('/', 'HomeController@index');

Route::group(['as'=>'app.'], function() {
    Route::get('/categories/{slug}', ['as'=>'categories.show', 'uses'=>'CategoriesController@show']);
});

Route::group(['middleware'=>['auth']], function() {

    Route::group(['middleware'=>['api_token'], 'namespace'=>'Api', 'as'=>'api.'], function() {
        Route::group(['prefix'=>'category', 'as'=>'category.'], function() {
            Route::get('find-by-name', ['as'=>'find-by-name', 'uses'=>'CategoriesController@findByName']);
        });

        Route::group(['prefix'=>'region', 'as'=>'region.'], function() {
            Route::get('find-by-name', ['as'=>'find-by-name', 'uses'=>'RegionsController@findByName']);
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
Route::patch('admin/categories/{category}/move/up', ['as'=>'admin.categories.move.up', 'uses'=>'Admin\\CategoriesController@moveUp']);
Route::patch('admin/categories/{category}/move/down', ['as'=>'admin.categories.move.down', 'uses'=>'Admin\\CategoriesController@moveDown']);
Route::patch('admin/categories/{category}/move/start', ['as'=>'admin.categories.move.start', 'uses'=>'Admin\\CategoriesController@moveToStart']);
Route::patch('admin/categories/{category}/move/end', ['as'=>'admin.categories.move.end', 'uses'=>'Admin\\CategoriesController@moveToEnd']);


Route::resource('admin/products', 'Admin\\ProductsController');
Route::patch('admin/products/{product}/move/up', ['as'=>'admin.products.move.up', 'uses'=>'Admin\\ProductsController@moveUp']);
Route::patch('admin/products/{product}/move/down', ['as'=>'admin.products.move.down', 'uses'=>'Admin\\ProductsController@moveDown']);
Route::patch('admin/products/{product}/move/start', ['as'=>'admin.products.move.start', 'uses'=>'Admin\\ProductsController@moveToStart']);
Route::patch('admin/products/{product}/move/end', ['as'=>'admin.products.move.end', 'uses'=>'Admin\\ProductsController@moveToEnd']);


Route::resource('admin/statuses', 'Admin\\StatusesController');
Route::patch('admin/statuses/{status}/move/up', ['as'=>'admin.statuses.move.up', 'uses'=>'Admin\\StatusesController@moveUp']);
Route::patch('admin/statuses/{status}/move/down', ['as'=>'admin.statuses.move.down', 'uses'=>'Admin\\StatusesController@moveDown']);
Route::patch('admin/statuses/{status}/move/start', ['as'=>'admin.statuses.move.start', 'uses'=>'Admin\\StatusesController@moveToStart']);
Route::patch('admin/statuses/{status}/move/end', ['as'=>'admin.statuses.move.end', 'uses'=>'Admin\\StatusesController@moveToEnd']);


Route::resource('admin/delivery-services', 'Admin\\DeliveryServicesController');
Route::patch('admin/delivery-services/{delivery-service}/move/up', ['as'=>'admin.delivery-services.move.up', 'uses'=>'Admin\\DeliveryServicesController@moveUp']);
Route::patch('admin/delivery-services/{delivery-service}/move/down', ['as'=>'admin.delivery-services.move.down', 'uses'=>'Admin\\DeliveryServicesController@moveDown']);
Route::patch('admin/delivery-services/{delivery-service}/move/start', ['as'=>'admin.delivery-services.move.start', 'uses'=>'Admin\\DeliveryServicesController@moveToStart']);
Route::patch('admin/delivery-services/{delivery-service}/move/end', ['as'=>'admin.delivery-services.move.end', 'uses'=>'Admin\\DeliveryServicesController@moveToEnd']);


Route::resource('admin/regions', 'Admin\\RegionsController');
Route::patch('admin/regions/{region}/move/up', ['as'=>'admin.regions.move.up', 'uses'=>'Admin\\RegionsController@moveUp']);
Route::patch('admin/regions/{region}/move/down', ['as'=>'admin.regions.move.down', 'uses'=>'Admin\\RegionsController@moveDown']);
Route::patch('admin/regions/{region}/move/start', ['as'=>'admin.regions.move.start', 'uses'=>'Admin\\RegionsController@moveToStart']);
Route::patch('admin/regions/{region}/move/end', ['as'=>'admin.regions.move.end', 'uses'=>'Admin\\RegionsController@moveToEnd']);
























Route::resource('admin/areas', 'Admin\\AreasController');