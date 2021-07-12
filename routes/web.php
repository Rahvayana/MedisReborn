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

Route::get('/admin', function () {

    return view('backend.admin.index');
});

Auth::routes();

//......Klinik
Route::get('/admin/klinik', 'KlinikController@index')->name('klinik');
Route::get('/admin/klinik-detail/{id}', 'KlinikController@detail')->name('klinik.detail');
Route::get('/admin/klinik/add', 'KlinikController@add')->name('klinik-add');
Route::post('/admin/klinik/save', 'KlinikController@save')->name('klinik-save');
Route::post('/admin/delete/klinik', 'KlinikController@delete');
Route::get('/admin/detail/klinik/{id}', 'KlinikController@detail');
Route::post('/admin/update/klinik', 'KlinikController@update');

// FrontEnd
Route::get('/', 'FrontEndController@index')->name('landing');
Route::get('/page/search', 'FrontEndController@searchKlinik')->name('search-klinik');
Route::get('/page/search_akupuntur', 'FrontEndController@searchAkupuntur')->name('search-akupuntur');
Route::get('/page/search_pijat', 'FrontEndController@searchPijat')->name('search-pijat');
Route::get('/page/search_bekam', 'FrontEndController@searchBekam')->name('search-bekam');
Auth::routes();
Route::post('/page/order', 'OrderController@generate')->name('order-generate');
Route::get('/page/order/payment/{order_id}', 'OrderController@paymentPage')->name('payment-order');
Route::post('/page/order/payment/save', 'OrderController@paymentSave')->name('payment-save');
Route::get('/page/order/after', 'OrderController@afterTransfer')->name('after-transfer');
Route::get('/page/order/{klinik_id}/{jenis_klinik}', 'OrderController@orderPage')->name('order');


// Route::get('/home', 'HomeController@index')->name('home');
