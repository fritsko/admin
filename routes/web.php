<?php

use Illuminate\Foundation\Application;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', 'ProdukController@dashboard')->name('dashboard');

Route::group(['middleware'=>'auth'], function(){
    Route::get('/produks' , 'ProdukController@index')->name('produks.index');
    Route::get('/produks/create' , 'ProdukController@create')->name('produks.create');
    Route::post('/produks' , 'ProdukController@store')->name('produks.store');
    Route::get('/produks/{produk}','ProdukController@show')->name('produks.show');
    Route::get('/produks/{produk}/edit' , 'ProdukController@edit')->name('produks.edit');
    Route::patch('/produks/{produk}' , 'ProdukController@update')->name('produks.update');
    Route::delete('/produks/{produk}' , 'ProdukController@destroy')->name('produks.destroy');

    Route::get('/kategoris' , 'KategoriController@index')->name('kategoris.index');
    Route::get('/kategoris/create' , 'KategoriController@create')->name('kategoris.create');
    Route::post('/kategoris' , 'KategoriController@store')->name('kategoris.store');
    Route::get('/kategoris/{kategori}','KategoriController@show')->name('kategoris.show');
    Route::get('/kategoris/{kategori}/edit' , 'KategoriController@edit')->name('kategoris.edit');
    Route::patch('/kategoris/{kategori}' , 'KategoriController@update')->name('kategoris.update');
    Route::delete('/kategoris/{kategori}' , 'KategoriController@destroy')->name('kategoris.destroy');
    
    Route::get('/home' , 'ProdukController@home')->name('home');
    Route::get('/profile' , 'ProdukController@profile')->name('profile');
});