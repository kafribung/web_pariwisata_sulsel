<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Auth::routes();


Route::get('/', 'HomeController@index')->name('home');

Route::get('detail/{slug}', 'HomeController@show');
Route::get('/search', 'HomeController@index');

Route::get('aboutus', 'HomeController@aboutus')->name('aboutus');
Route::get('contact', 'HomeController@contact')->name('contact');

Route::group(['middleware' => 'auth'], function(){
	
	Route::get('/post/tampil_hapus', 'TempatwisataController@tampil_hapus')->name('post.tampil_hapus');

    Route::delete('/post/destroy/{id}', 'TempatwisataController@destroy')->name('post.destroy');
    Route::get('/tempatwisata/edit/{id}', 'TempatwisataController@edit')->name('post.edit');
    Route::put('/tempatwisata/update/{id}', 'TempatwisataController@update')->name('post.update');
    Route::get('/tempatwisataLog', 'TempatwisataController@index')->name('tempatwisata');
    Route::get('/tambahdata', 'TempatwisataController@add')->name('post.create');
    Route::post('/storedata', 'TempatwisataController@store')->name('post.store');

});

Route::get('/post/tampil_hapus', 'TempatwisataController@tampil_hapus')->name('post.tampil_hapus');

Route::delete('/post/destroy/{id}', 'TempatwisataController@destroy')->name('post.destroy');
Route::get('/tempatwisata/edit/{id}', 'TempatwisataController@edit')->name('post.edit');
Route::put('/tempatwisata/update/{id}', 'TempatwisataController@update')->name('post.update');
Route::get('/tempatwisata', 'TempatwisataController@index')->name('tempatwisata');
Route::get('/tambahdata', 'TempatwisataController@add')->name('post.create');
Route::post('/storedata', 'TempatwisataController@store')->name('post.store');

Route::get('/home', 'HomeController@index')->name ('home');