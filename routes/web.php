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

/*User interface*/
	/*Home*/
		Route::get('',['as'=>'home', 'uses'=>'HomeController@user_home']);
	/*404*/
		Route::get('error_404',['as'=>'error_404', 'uses'=>'HomeController@error_404']);

	/*Register*/
		Route::post('register',['as'=>'register', 'uses'=>'RegisterController@postRegister_modal']);

	/*Login*/
		Route::post('login',['as'=>'login', 'uses'=>'LoginController@postLogin_modal']);

	/*Login by FaceBook*/
		Route::get('facebook/redirect',['as'=>'facebook','uses'=>'SocialController@facebookredirect']);
		Route::get('facebook/callback', ['as'=>'facebook.callback', 'uses'=>'SocialController@facebookcallback']);
	/*Login by Google*/
		Route::get('google/redirect',['as'=>'google','uses'=>'SocialController@googleredirect']);
		Route::get('google/callback', ['as'=>'google.callback', 'uses'=>'SocialController@googlecallback']);
	/*Show information user*/
		Route::get('information', ['as'=>'admin.user.information', 'uses'=>'UserController@information_user']);

	/*Edit information user*/
		Route::get('edit',['as'=>'edit', 'uses'=>'UserController@get_edit_user']);
		Route::post('edit',['as'=>'edit', 'uses'=>'UserController@post_edit_user']);

	/*Logout*/
		Route::get('logout', ['as'=>'logout', 'uses'=>'LoginController@logout']);

	/*Article detail*/
		Route::get('new_post', ['as'=>'new_post', 'uses'=>'HomeController@new_post']);
		Route::get('listening', ['as'=>'listening', 'uses'=>'HomeController@listening']);
		Route::get('reading', ['as'=>'reading', 'uses'=>'HomeController@reading']);
		Route::get('library', ['as'=>'library', 'uses'=>'HomeController@library']);

		Route::get('practice_listening', ['as'=>'practice_listening', 'uses'=>'HomeController@practice_listening']);
		Route::get('practice/listening/{tittle_audio}',['as'=>'tittle_audio','uses'=>'HomeController@tittle_audio']);

		/*Comment*/
		Route::get('comment/{acticle_id}/{acticle_tittle}/{article_type}',['as'=>'comment','uses'=>'CommentController@comment']);
		Route::post('comment/{acticle_id}/{acticle_tittle}/{article_type}',['as'=>'comment','uses'=>'CommentController@comment']);
		Route::get('delete/comment/{id}',['as'=>'delete_comment','uses'=>'CommentController@delete']);

	/*Contact us*/
		Route::post('contact', ['as'=>'contact', 'uses'=>'HomeController@contact']);

		Route::get('/article/{type}/{tittle}',['as'=>'detail_article','uses'=>'HomeController@detail_article']);


/*Admin Page*/


Route::group(['prefix' => 'admin', 'middleware'=>'checkadmin'], function(){

	Route::get('dashboard',['as'=>'admin.dashboard', 'uses'=>'HomeController@dashboard']);

	/*User Pages*/
	Route::group(['prefix'=>'user'], function(){

		/*Show Users*/
		Route::get('show',['as'=>'admin.user.show', 'uses'=>'UserController@show']);

		/*Show information User*/
		Route::get('information', ['as'=>'admin.user.information', 'uses'=>'UserController@information_user']);

		/*Add Users*/
		Route::post('add',['as'=>'admin.user.add', 'uses'=>'UserController@add_user']);

		/*Edit Users*/
		Route::get('edit',['as'=>'admin.user.edit', 'uses'=>'UserController@get_edit_user']);
		Route::post('edit',['as'=>'admin.user.edit', 'uses'=>'UserController@post_edit_user']);

		/*Delete User*/
		Route::get('delete_view', ['as'=>'admin.user.delete','uses'=>'UserController@get_delete_user']);
		Route::post('delete', ['as'=>'admin.user.delete','uses'=>'UserController@post_delete_user']);
	});

	/*Cate Pages*/
	Route::group(['prefix' =>'cate'], function(){

		/*Show categories*/
		Route::get('show', ['as' => 'admin.cate.show', 'uses' => 'CategoryController@show']);

		/*Show detail categories*/
		Route::get('catedetail', ['as' => 'admin.cate.catedetail', 'uses' => 'CategoryController@view_cate_detail']);

		/*Add categories*/
		Route::get('add', ['as' => 'admin.cate.addcate', 'uses' => 'CategoryController@get_add_cate']);
		Route::post('add', ['as' => 'admin.cate.addcate', 'uses' => 'CategoryController@post_add_cate']);

		/*Edit Category*/
		Route::get('edit', ['as' => 'admin.cate.editcate', 'uses' => 'CategoryController@get_edit_cate']);
		Route::post('edit', ['as' => 'admin.cate.editcate', 'uses' => 'CategoryController@post_edit_cate']);

		/*Delete category*/
		Route::get('delete_view',['as' => 'admin.cate.delete', 'uses' => 'CategoryController@get_delete_cate']);
		Route::post('delete',['as' => 'admin.cate.delete', 'uses' => 'CategoryController@post_delete_cate']);

	});

	/*Detail Pages*/
	Route::group(['prefix' => 'detail'], function(){

		/*Show details*/
		Route::get('show',['as'=>'admin.detail.show','uses'=>'DetailController@show']);

		/*Add details*/
		Route::get('add',['as'=>'admin.detail.adddetail', 'uses'=>'DetailController@get_add_detail']);
		Route::post('add',['as'=>'admin.detail.adddetail', 'uses'=>'DetailController@post_add_detail']);

		/*View Content*/
		Route::get('content',['as'=>'admin.detail.content', 'uses'=>'DetailController@detail_content']);

		/*Edit details*/
		Route::get('edit', ['as'=>'admin.detail.editdetail', 'uses'=>'DetailController@get_edit_detail']);
		Route::post('edit', ['as'=>'admin.detail.editdetail', 'uses'=>'DetailController@post_edit_detail']);

		/*Delete details*/
		Route::get('delete', ['as'=>'admin.detail.delete', 'uses'=>'DetailController@get_delete_detail']);
		Route::post('delete', ['as'=>'admin.detail.delete', 'uses'=>'DetailController@post_delete_detail']);

	});

	/*Banners Pages*/
	Route::group(['prefix' => 'banner'], function(){
		/*Show Banners*/
		Route::get('show', ['as'=>'admin.banner.show', 'uses'=>'BannerController@show']);

		/*View Banner Details*/
		Route::get('detail',['as'=>'admin.banner.detail','uses'=>'BannerController@view_banner_detail']);

		/*Add Banner*/
		Route::post('add',['as'=>'admin.banner.addbanner','uses'=>'BannerController@post_add_banner']);

		/*Edit Banner*/
		Route::get('edit',['as'=>'admin.banner.edit','uses'=>'BannerController@get_edit_banner']);
		Route::post('edit',['as'=>'admin.banner.edit','uses'=>'BannerController@post_edit_banner']);

		/*Delete Banner*/
		Route::get('delete',['as'=>'admin.banner.delete','uses'=>'BannerController@get_delete_banner']);
		Route::post('delete',['as'=>'admin.banner.delete','uses'=>'BannerController@post_delete_banner']);
	});

	/*Contact Pages*/
	Route::group(['prefix'=>'contact'], function(){
		/*Show Contacts info*/
		Route::get('show',['as'=>'admin.contact.show','uses'=>'ContactController@show']);

		/*View Contacts Details*/
		Route::get('detail',['as'=>'admin.contact.detail','uses'=>'ContactController@view_contact_detail']);

		/*Add Contacts*/
		Route::post('add',['as'=>'admin.contact.addbanner','uses'=>'ContactController@post_add_contact']);

		/*Edit Contacts*/
		Route::get('edit',['as'=>'admin.contact.edit','uses'=>'ContactController@get_edit_contact']);
		Route::post('edit',['as'=>'admin.contact.edit','uses'=>'ContactController@post_edit_contact']);

		/*Delete Contacts*/
		Route::get('delete',['as'=>'admin.contact.delete','uses'=>'ContactController@get_delete_contact']);
		Route::post('delete',['as'=>'admin.contact.delete','uses'=>'ContactController@post_delete_contact']);
	});

	/*Listening Pages*/
	Route::group(['prefix'=>'listening'], function(){
		Route::get('show',['as'=>'admin.listening.show', 'uses'=>'ListeningController@show']);

		/*View Contacts Listening*/
		Route::get('detail',['as'=>'admin.listening.detail','uses'=>'ListeningController@view_listening_detail']);

		/*Add Listening*/
		Route::get('add',['as'=>'admin.listening.add','uses'=>'ListeningController@get_add_listening']);
		Route::post('add',['as'=>'admin.listening.add','uses'=>'ListeningController@post_add_listening']);

		/*Edit Listening*/
		Route::get('edit',['as'=>'admin.listening.edit','uses'=>'ListeningController@get_edit_listening']);
		Route::post('edit',['as'=>'admin.listening.edit','uses'=>'ListeningController@post_edit_listening']);

		/*Delete Listening*/
		Route::get('delete',['as'=>'admin.listening.delete','uses'=>'ListeningController@get_delete_listening']);
		Route::post('delete',['as'=>'admin.listening.delete','uses'=>'ListeningController@post_delete_listening']);
	});

	/*Comment Pages*/
	Route::group(['prefix'=>'comment'], function(){
		Route::get('show-comment',['as'=>'admin.comment.show', 'uses'=>'CommentController@show']);

		/*View Contacts Comment*/
		Route::get('detail',['as'=>'admin.comment.detail','uses'=>'CommentController@view_comment_detail']);

		/*Delete Comment*/
		Route::get('delete',['as'=>'admin.comment.delete','uses'=>'CommentController@get_delete_comment']);
		Route::post('delete',['as'=>'admin.comment.delete','uses'=>'CommentController@post_delete_comment']);
	});

});


