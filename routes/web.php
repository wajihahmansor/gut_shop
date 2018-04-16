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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/food/index', 'FoodController@index')->name('food.index');
Route::get('/food', 'FoodController@index')->name('food.index');
Route::get('/food/details/{food_id}', 'FoodController@details')->name('food.details');
Route::get('/food/add', 'FoodController@add')->name('food.add');
Route::post('/food/insert', 'FoodController@insert')->name('food.insert');
Route::get('/food/edit/{food_id}', 'FoodController@edit')->name('food.edit');
Route::post('/food/update/{food_id}', 'FoodController@update')->name('food.update');
Route::get('/food/delete/{food_id}', 'FoodController@delete')->name('food.delete');

/*Route::get('/posts/index', 'PostsController@index')->name('posts.index');
Route::get('/posts', 'PostsController@index')->name('posts.index');
Route::get('/posts/details/{id}', 'PostsController@details')->name('posts.details');
Route::get('/posts/add', 'PostsController@add')->name('posts.add');
Route::post('/posts/insert', 'PostsController@insert')->name('posts.insert');
Route::get('/posts/edit/{id}', 'PostsController@edit')->name('posts.edit');
Route::post('/posts/update/{id}', 'PostsController@update')->name('posts.update');
Route::get('/posts/delete/{id}', 'PostsController@delete')->name('posts.delete');*/