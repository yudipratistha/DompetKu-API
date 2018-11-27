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



Route::post('create_task', 'API\TbTasksController@store');
Route::get('see_task/{id}', 'API\TbTasksController@show');
Route::post('update_task/{id_task}', 'API\TbTasksController@update');
Route::delete('delete_task/{id_task}', 'API\TbTasksController@destroy');


Route::group(['middleware' => 'auth:api'], function(){
Route::post('details', 'API\UserController@details');
});
