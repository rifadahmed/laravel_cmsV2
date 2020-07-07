<?php



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@index');


Route::auth();
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('post/{id}',['as'=>'home.post','uses'=>'adminPostsController@post']);

Route::group(['middleware' => 'admin'], function () {
    Route::get('admin', function() {
        return view('admin.index');
    });
    Route::resource('admin/users','adminUsersController',['names'=>[
        'index'=>'admin.users.index',
        'show'=>'admin.users.show',
        'create'=>'admin.users.create',
        'store'=>'admin.users.store',
        'edit'=>'admin.users.edit',
        'update'=>'admin.users.update',
        'delete'=>'admin.users.destroy',

    ]]);


    Route::resource('admin/posts','adminPostsController',['names'=>[
        'index'=>'admin.posts.index',
        'show'=>'admin.posts.show',
        'create'=>'admin.posts.create',
        'store'=>'admin.posts.store',
        'edit'=>'admin.posts.edit',
        'update'=>'admin.posts.update',
        'delete'=>'admin.posts.destroy',
       
    ]]);
    Route::resource('admin/categories', 'adminCategoriesController',['names'=>[
        'index'=>'admin.categories.index',
        'show'=>'admin.categories.show',
        'create'=>'admin.categories.create',
        'store'=>'admin.categories.store',
        'edit'=>'admin.categories.edit',
        'update'=>'admin.categories.update',
        'delete'=>'admin.categories.destroy',
    ]]);
    Route::resource('admin/media', 'adminMediaController',['names'=>[
        'index'=>'admin.media.index',
        'show'=>'admin.media.show',
        'create'=>'admin.media.create',
        'store'=>'admin.media.store',
        'edit'=>'admin.media.edit',
        'update'=>'admin.media.update',
        // 'delete'=>'admin.media.destroy',
    ]]);

    Route::delete('admin/delete/media','adminMediaController@bulkDelete');
    Route::resource('admin/comments', 'postCommentsController',['names'=>[
        'index'=>'admin.comments.index',
        'show'=>'admin.comments.show',
        'create'=>'admin.comments.create',
        'store'=>'admin.comments.store',
        'edit'=>'admin.comments.edit',
        'update'=>'admin.comments.update',
        'delete'=>'admin.comments.destroy',
    ]]);
    Route::resource('admin/comment/replies', 'commentRepliesController',['names'=>[
        'index'=>'admin.comment.replies.index',
        'show'=>'admin.comment.replies.show',
        'create'=>'admin.comment.replies.create',
        'store'=>'admin.comment.replies.store',
        'edit'=>'admin.comment.replies.edit',
        'update'=>'admin.comment.replies.update',
        'delete'=>'admin.comment.replies.destroy',
    ]]);



});



