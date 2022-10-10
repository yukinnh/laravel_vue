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
    // ↓のやつ
    Route::get('/categories/{category}/posts', 'CategoryController@postsIndex');
    Route::get('/categories/create', 'CategoryController@create');
    
    // post
    Route::post('/posts', 'PostController@store');
    Route::post('/categories', 'CategoryController@store');
    
    // put
    Route::put('/posts/{post}', 'PostController@update');
    
    //delete
    Route::delete('/posts/{post}', 'PostController@delete');
    
    Route::get('/posts/{post}/get_comments', 'CommentController@getComments')->name('get_comments');
    Route::resource('posts.comments', 'CommentController', [
     'only' => ['store', 'update', 'destroy'],
    ]);
});



Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();