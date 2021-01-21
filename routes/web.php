<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users', 'UserController@showUsers')->name('user.list');
Route::get('/user/create', 'UserController@createUser')->name('user.create');
Route::post('/user/create', 'UserController@saveUser');
Route::get('/user/edit/{id}', 'UserController@getUser')->name('user.edit');
Route::put('/user/edit/{id}', 'UserController@saveUser')->name('user.update');
Route::get('/user/delete/{id}', 'UserController@deleteUser')->name('user.delete');