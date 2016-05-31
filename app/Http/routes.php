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

Route::get('/', ['as' => 'home' , function () {
    return view('pages/index');
}]);

Route::group(['name' => 'products', 'prefix' => 'products'], function(){
  Route::get('/', ['as' => 'products.index', 'uses' => 'ProductsController@index']);
  Route::get('/create', ['as' => 'products.create', 'uses' => 'ProductsController@create']);
  Route::get('/{id}/edit', ['as' => 'products.edit', 'uses' => 'ProductsController@edit']);

  Route::post('/', ['as' => 'products.store', 'uses' => 'ProductsController@store']);
  Route::post('/save', ['as' => 'products.save', 'uses' => 'ProductsController@save']);

  Route::put('{id}', ['as' => 'products.update', 'uses' => 'ProductsController@update']);

  Route::delete('{id}/destroy', ['as' => 'products.destroy', 'uses' => 'ProductsController@destroy']);
});
//
// Route::resource('products', 'ProductsController');
