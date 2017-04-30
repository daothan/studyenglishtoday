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

/*Admin Page*/

Route::group(['prefix' => 'admin'], function(){
	Route::group(['prefix' =>'cate'], function(){

		/*Show categories*/
		Route::get('show', ['as' => 'admin.cate.show', 'uses' => 'CategoryController@show']);

		/*Add categories*/
		Route::get('add', ['as' => 'admin.cate.getAdd', 'uses' => 'CategoryController@getAdd']);

		Route::post('add', ['as' => 'admin.cate.postAdd', 'uses' => 'CategoryController@postAdd']);

		/*Delete category*/
		Route::post('delete/{id}',['as' => 'admin.cate.delete', 'uses' => 'CategoryController@delete']);

		/*Edit Category*/

		Route::get('edit/{id}', ['as'=>'admin.cate.getEdit', 'uses'=>'CategoryController@getEdit']);

		Route::post('edit/{id}', ['as' => 'admin.cate.postEdit', 'uses' => 'CategoryController@postEdit']);
	});
});