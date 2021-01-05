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

// Route::get('/', function () {
//     return view('welcome');
// });


// menampilkan data
Route::get('/product', 'ProductController@get');
Route::get('/product/{id}', 'ProductController@getbyid');

// input data
Route::post('/product', 'ProductController@post');

// ubah data
Route::get('/product/{id}/edit', 'ProductController@edit');
Route::post('/product/{id}/update', 'ProductController@update');

// hapus data
Route::get('/product/{id}/delete', 'ProductController@delete');