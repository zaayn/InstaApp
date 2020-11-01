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

Route::get('/', 'Auth\LoginController@authenticated');

Auth::routes();


Route::group(['prefix' => 'admin',  'middleware' => 'is_admin'], function(){
    Route::get('/home', 'AdminController@index')->name('home'); //Dashboard super admin
});

Route::group(['prefix' => 'user',  'middleware' => 'is_user'], function(){
    Route::get('/home', 'UserController@index')->name('home'); //Dashboard super admin
    Route::get('/insert_post', 'PostController@insert');
    Route::post('/store/post', 'PostController@store')->name('store.post');
    Route::get('/post{id}','PostController@post')->name('post');
    Route::post('/store/comemnt', 'CommentController@store')->name('store.comment');
    Route::get('/update/like{pid}','PostController@like')->name('update.like');
});
