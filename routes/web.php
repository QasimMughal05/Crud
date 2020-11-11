<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/product', 'ProductController@index');
Route::get('/product/create', 'ProductController@create')->name('product.create');
Route::post('/product/store', 'ProductController@store');
Route::get('/product/edit/{id}', 'ProductController@edit')->name('product.edit');
Route::post('/product/update', 'ProductController@update');
Route::get('/product/delete/{id}', 'ProductController@delete')->name('product.delete');
