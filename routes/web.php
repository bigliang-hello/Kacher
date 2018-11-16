<?php

Route::get('/', 'PagesController@root')->name('root');
Auth::routes();
Route::resource('users', 'UsersController', ['only' => ['show', 'update', 'edit']]);
Route::resource('topics','TopicsController');
Route::resource('categories', 'CategoriesController', ['only' => ['show']]);
Route::post('upload_image', 'TopicsController@uploadImage')->name('topics.upload_image');