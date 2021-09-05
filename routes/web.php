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

// Route::get('/admin', function () {

//     return view('backend.admin.index');
// });

Auth::routes();

//......Admin
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/transaksi', 'AdminController@transaksi')->name('admin.transaksi');
Route::get('/transaksi/{id}', 'AdminController@detail')->name('admin.detail');
Route::post('/transaksi-confirm/{id}', 'AdminController@konfirmasi')->name('admin.transaksi.confirm');
//......Klinik
Route::get('/admin/klinik', 'KlinikController@index')->name('klinik');
Route::get('/admin/klinik-detail/{id}', 'KlinikController@detail')->name('klinik.detail');
Route::get('/admin/klinik/add', 'KlinikController@add')->name('klinik-add');
Route::post('/admin/klinik/save', 'KlinikController@save')->name('klinik-save');
Route::post('/admin/delete/klinik', 'KlinikController@delete');
Route::get('/admin/detail/klinik/{id}', 'KlinikController@edit')->name('klinik.edit');
Route::post('/admin/update/klinik/{id}', 'KlinikController@update')->name('klinik.update');
Route::post('/admin/delete/klinik/{id}', 'KlinikController@delete');

//Terapi
Route::get('/admin/terapi', 'AdminController@terapi')->name('terapi.list');
Route::post('/admin/terapi-store', 'AdminController@terapiStore')->name('terapi.store');
Route::post('/admin/terapi-update/{id}', 'AdminController@terapiUpdate')->name('terapi.update');
Route::post('/admin/terapi-delete/{id}', 'AdminController@delete')->name('terapi.delete');

Route::get('tentang-kami', function () {
    return view('frontend.tentang');
});
Route::get('gabung-mitra', function () {
    return view('frontend.gabung');
});


Route::match(['get', 'post'], '/admin/laporan', 'KlinikController@laporan')->name('laporan.keuangan');

//PASIEN
Route::get('/pasien', 'AdminController@pasien')->name('pasien');
Route::get('/listpasien', 'AdminController@listpasien')->name('pasien.list');

//Cek Route 
Route::get('/check', 'FrontEndController@auth')->name('auth');

// FrontEnd
Route::get('/', 'FrontEndController@index')->name('landing');
Route::get('/profile', 'FrontEndController@profile')->name('profile');
Route::post('/profile', 'FrontEndController@updateprofile')->name('profile.update');
Route::get('/transaksi-detail/{id}', 'FrontEndController@detail')->name('profile.transaksi');
Route::get('/page/search', 'FrontEndController@searchKlinik')->name('search-klinik');
//TODO LST
Route::post('/page/search/{slug}', 'FrontEndController@search')->name('search-terapi');
Route::get('/page/search_pijat', 'FrontEndController@searchPijat')->name('search-pijat');
Route::get('/page/search_bekam', 'FrontEndController@searchBekam')->name('search-bekam');
Auth::routes();
Route::post('/page/order', 'OrderController@generate')->name('order-generate');
Route::get('/page/order/payment/{order_id}', 'OrderController@paymentPage')->name('payment-order');
Route::post('/page/order/payment/save', 'OrderController@paymentSave')->name('payment-save');
Route::get('/page/order/after', 'OrderController@afterTransfer')->name('after-transfer');
Route::get('/page/order/{klinik_id}/{jenis_klinik}', 'OrderController@orderPage')->name('order');


// Route::get('/home', 'HomeController@index')->name('home');
