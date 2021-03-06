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
Route::get('/', 'HomeController@index')->name('home');
Route::get('/sedes/{id}', 'SedesController@index')->name('sedes');
Route::get('/citas', 'CitasController@add')->name('citas.add');
Route::post('/citas/add', 'CitasController@add')->name('ajaxRequest.post');
