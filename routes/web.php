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

Route::get('/', 'HomeController@index');

/*User interface*/
	Route::group(['prefix'=>'user'], function(){
		Route::get('home',['as'=>'user.home', 'uses'=>'HomeController@user_interface']);


	/*Register*/
		Route::post('home/register',['as'=>'user.register', 'uses'=>'RegisterController@postRegister_modal']);

	/*Login*/
		Route::post('home/login',['as'=>'user.login', 'uses'=>'LoginController@postLogin_modal']);

	/*Login by FaceBook*/
		Route::get('facebook/redirect',['as'=>'user.facebook','uses'=>'SocialController@facebookredirect']);
		Route::get('facebook/callback', ['as'=>'user.facebook.callback', 'uses'=>'SocialController@facebookcallback']);
	/*Login by Google*/
		Route::get('google/redirect',['as'=>'user.google','uses'=>'SocialController@googleredirect']);
		Route::get('google/callback', ['as'=>'user.google.callback', 'uses'=>'SocialController@googlecallback']);
	/*Show information user*/
		Route::get('information/{id}', ['as'=>'user.information', 'uses'=>'UserController@information']);

	/*Edit information user*/
		Route::get('edit/{id}', ['as'=>'user.edit', 'uses'=>'UserController@getEdit']);
		Route::post('edit/{id}', ['as'=>'user.edit', 'uses'=>'UserController@postEdit']);

	/*Logout*/
		Route::get('home/logout', ['as'=>'user.logout', 'uses'=>'LoginController@logout']);
	});



/*Admin Page*/

Route::group(['prefix' => 'admin', 'middleware'=>'checkadmin'], function(){

	Route::get('dashboard',['as'=>'admin.dashboard', 'uses'=>'HomeController@dashboard']);

	/*Cate Pages*/
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

	/*Detail Pages*/
	Route::group(['prefix' => 'detail'], function(){

		/*Show details*/
		Route::get('show',['as'=>'admin.detail.show','uses'=>'DetailController@show']);

		/*Add details*/
		Route::get('add',['as'=>'admin.detail.getAdd', 'uses'=>'DetailController@getAdd']);
		Route::post('add',['as'=>'admin.detail.postAdd', 'uses'=>'DetailController@postAdd']);

		/*Edit details*/
		Route::get('edit/{id}', ['as'=>'admin.detail.getEdit', 'uses'=>'DetailController@getEdit']);
		Route::post('edit/{id}', ['as'=>'admin.detail.postEdit', 'uses'=>'DetailController@postEdit']);

		/*Delete details*/
		Route::post('delete/{id}', ['as'=>'admin.detail.delete', 'uses'=>'DetailController@delete']);

		/*View Content*/
		Route::get('content/{id}',['as'=>'admin.detail.content', 'uses'=>'DetailController@content']);
	});

	/*User Pages*/
	Route::group(['prefix'=>'user'], function(){

		/*Show Users*/
		Route::get('show',['as'=>'admin.user.show', 'uses'=>'UserController@show']);

		/*Show information User*/
		Route::get('information/{id}', ['as'=>'admin.user.information', 'uses'=>'UserController@information']);

		/*Add Users*/
		Route::get('add',['as'=>'admin.user.getAdd', 'uses'=>'UserController@getAdd']);
		Route::post('add',['as'=>'admin.user.postAdd', 'uses'=>'UserController@postAdd']);

		/*Edit Users*/
		Route::get('edit/{id}',['as'=>'admin.user.getEdit', 'uses'=>'UserController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.user.postEdit', 'uses'=>'UserController@postEdit']);

		/*Delete User*/
		Route::post('delete/{id}', ['as'=>'admin.user.delete','uses'=>'UserController@delete']);
	});
});




