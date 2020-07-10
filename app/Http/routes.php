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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::auth();

// Route::get('admin', function() {
//     return view('admin.index');
// });

Route::get('/home', 'HomeController@index');

// Route::get('post/{id}',['as'=>'home.post','uses'=>'adminPostsController@post']);

// Route::group(['middleware' => 'admin'], function () {
//     Route::resource('admin/users','adminUsersController');
//     Route::resource('admin/posts','adminPostsController');
//     Route::resource('admin/categories', 'adminCategoriesController');
//     Route::resource('admin/media', 'adminMediaController');
//     Route::resource('admin/comments', 'postCommentsController');
//     Route::resource('admin/comment/replies', 'commentRepliesController');



// });





