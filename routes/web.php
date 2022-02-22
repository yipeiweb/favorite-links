<?php

Route::get('/', 'LinkController@index');

Route::get('/user-edit', 'UserController@edit')->name('user-edit')->middleware('auth');
Route::put('/user-update', 'UserController@update')->middleware('auth');

Route::get('/denglu', 'Auth\LoginController@showLoginForm')->name('denglu');
Route::post('/denglu', 'Auth\LoginController@login')->name('denglu');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout')->middleware('auth');

Route::get('/links', 'LinkController@index')->name('links.index');
Route::post('/links', 'LinkController@store')->name('links.store')->middleware('auth');
Route::get('/links/create/{category?}', 'LinkController@create')->name('links.create')->middleware('auth');
Route::put('/links/{category}', 'LinkController@update')->name('links.update')->middleware('auth');
Route::delete('/links/{category}', 'LinkController@destroy')->name('links.destroy')->middleware('auth');
Route::get('/links/{category}/edit', 'LinkController@edit')->name('links.edit')->middleware('auth');

Route::get('/categories', 'CategoryController@index')->name('categories.index');
Route::post('/categories', 'CategoryController@store')->name('categories.store')->middleware('auth');
Route::get('/categories/create', 'CategoryController@create')->name('categories.create')->middleware('auth');
Route::get('/categories/{category}', 'CategoryController@show')->name('categories.show');
Route::put('/categories/{category}', 'CategoryController@update')->name('categories.update')->middleware('auth');
Route::delete('/categories/{category}', 'CategoryController@destroy')->name('categories.destroy')->middleware('auth');
Route::get('/categories/{category}/edit', 'CategoryController@edit')->name('categories.edit')->middleware('auth');
