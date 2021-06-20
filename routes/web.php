<?php

use Illuminate\Support\Facades\Auth;
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
    return view('backend.admin.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//......Klinik
Route::get('/klinik', 'KlinikController@index')->name('klinik');
Route::get('/klinik/add', 'KlinikController@add')->name('klinik-add');
Route::post('/klinik/save', 'KlinikController@save')->name('klinik-save');
Route::post('/delete/klinik', 'KlinikController@delete');
Route::get('/detail/klinik/{id}', 'KlinikController@detail');
Route::post('/update/klinik', 'KlinikController@update');
