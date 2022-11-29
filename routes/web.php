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

// auth
Route::group(['middleware' => ['auth']], function(){
    // get
    Route::get('/', 'PostController@index');
    Route::get('/posts/create', 'PostController@create');
    Route::get('/posts/{post}', 'PostController@show');
    Route::get('/posts/{post}/edit', 'PostController@edit');
    Route::get('/categories/', 'CategoryController@index');
    Route::get('/categories/{category}/posts', 'CategoryController@postsIndex');
    Route::get('/categories/create', 'CategoryController@create');
    
    // post
    Route::post('/posts', 'PostController@store');
    Route::post('/categories', 'CategoryController@store');
    
    // put
    Route::put('/posts/{post}', 'PostController@update');
    
    //delete
    Route::delete('/posts/{post}', 'PostController@delete');
    
    // コメント
    Route::get('/posts/{post}/get_comments', 'CommentController@getComments')->name('get_comments');
    Route::resource('posts.comments', 'CommentController', [
     'only' => ['store', 'update', 'destroy'],
    ]);
    
    // コメント詳細
    Route::get('posts/{post}/comments/{comment}/get_comments', 'CommentdetailController@getComments')->name('comment_details.get_comments');
    Route::resource('posts.comments.commentdetails', 'CommentdetailController', [
     'only' => ['store', 'update', 'destroy'],
    ]);
    
    // いいね
    Route::get('/posts/{post}/check', 'LikeController@check')->name('like.check');
    Route::get('/posts/{post}/counts', 'LikeController@counts')->name('like.counts');
    Route::resource('posts.likes', 'LikeController', [
     'only' => ['store'],
    ]);
});



Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();