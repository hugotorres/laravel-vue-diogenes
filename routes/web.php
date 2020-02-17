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
Route::post('/api/product/create', 'ProductController@store')->name('create-product');
Route::post('/api/profile/create', 'UserController@store')->name('create-profile');
Route::post('/api/profile/upload', 'UserController@upload')->name('image-upload');



Route::get('/', 'PrehomeController@prehome')->name('prehome');
Route::get('/welcome', 'WelcomController@index');


Route::get('/admin', 'UserController@admin')->name('admin');

Route::get('/admin/users', 'UserController@users')->name('admin.users');
Route::get('/admin/categories', 'UserController@categories')->name('admin.categories');
Route::post('/admin/categories/new', 'UserController@newCategory')->name('admin.newCategory');

Route::get('/categories', 'CategoryController@index')->name('category');

Auth::routes();

Route::get('/favorites', 'HomeController@index')->name('favorites');


Route::get('/user/{id}', 'UserController@profile')->name('user.profile');
Route::delete('/user/profile/image', 'UserController@profileImageDelete')->name('user.profile.image.delete');

//Route::options('{all}', 'HomeController@options')->where('all', '.*');
