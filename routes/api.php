<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
Route::post('logout', 'API\UserController@login');
Route::get('userdata', 'API\UserController@index');



Route::post('buat_transaksi', 'API\TransaksiController@store');
Route::get('lihat_transaksi/{id}', 'API\TransaksiController@show');
Route::post('update_transaksi/{id}', 'API\TransaksiController@update');
Route::delete('delete_transaksi/{id}', 'API\TransaksiController@destroy');

Route::get('lihat_kategori/{id}', 'API\KategoriController@show');

Route::group(['middleware' => 'auth:api'], function(){
Route::post('details', 'API\UserController@details');
});
