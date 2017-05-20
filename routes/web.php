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

	/*User Pages*/
	Route::group(['prefix'=>'user'], function(){

		/*Show Users*/
		Route::get('show',['as'=>'admin.user.show', 'uses'=>'UserController@show']);

		/*Show information User*/
		Route::get('information', ['as'=>'admin.user.information', 'uses'=>'UserController@information']);

		/*Add Users*/
		Route::post('add',['as'=>'admin.user.add', 'uses'=>'UserController@add']);

		/*Edit Users*/
		Route::get('edit',['as'=>'admin.user.edit', 'uses'=>'UserController@view_edit']);
		Route::post('edit',['as'=>'admin.user.edit', 'uses'=>'UserController@edit']);

		/*Delete User*/
		Route::get('delete_view', ['as'=>'admin.user.delete','uses'=>'UserController@delete_view']);
		Route::post('delete', ['as'=>'admin.user.delete','uses'=>'UserController@delete']);
	});

	/*Cate Pages*/
	Route::group(['prefix' =>'cate'], function(){

		/*Show categories*/
		Route::get('show', ['as' => 'admin.cate.show', 'uses' => 'CategoryController@show']);

		/*Show detail categories*/
		Route::get('catedetail', ['as' => 'admin.cate.catedetail', 'uses' => 'CategoryController@view_cate_detail']);

		/*Add categories*/
		Route::get('add', ['as' => 'admin.cate.addcate', 'uses' => 'CategoryController@getaddcate']);
		Route::post('add', ['as' => 'admin.cate.addcate', 'uses' => 'CategoryController@addcate']);

		/*Edit Category*/
		Route::get('edit', ['as' => 'admin.cate.editcate', 'uses' => 'CategoryController@view_edit']);
		Route::post('edit', ['as' => 'admin.cate.editcate', 'uses' => 'CategoryController@edit']);

		/*Delete category*/
		Route::get('delete_view',['as' => 'admin.cate.delete', 'uses' => 'CategoryController@delete_view']);
		Route::post('delete',['as' => 'admin.cate.delete', 'uses' => 'CategoryController@delete']);

	});

	/*Detail Pages*/
	Route::group(['prefix' => 'detail'], function(){

		/*Show details*/
		Route::get('show',['as'=>'admin.detail.show','uses'=>'DetailController@show']);

		/*Add details*/
		Route::get('add',['as'=>'admin.detail.adddetail', 'uses'=>'DetailController@getadddetail']);
		Route::post('add',['as'=>'admin.detail.adddetail', 'uses'=>'DetailController@add']);

		/*View Content*/
		Route::get('content',['as'=>'admin.detail.content', 'uses'=>'DetailController@detail_content']);

		/*Edit details*/
		Route::get('edit', ['as'=>'admin.detail.editdetail', 'uses'=>'DetailController@geteditdetail']);
		Route::post('edit', ['as'=>'admin.detail.editdetail', 'uses'=>'DetailController@edit']);

		/*Delete details*/
		Route::get('delete_view', ['as'=>'admin.detail.delete', 'uses'=>'DetailController@delete_view']);
		Route::post('delete', ['as'=>'admin.detail.delete', 'uses'=>'DetailController@delete']);

	});

});




