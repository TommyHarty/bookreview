<?php

Route::get('/', 'UsersController@index')->name('home');

Auth::routes();

Route::get('/users', 'PagesController@users')->name('all.users');
Route::get('/reviews', 'PagesController@books')->name('all.books');
Route::get('/users/{user}', 'UsersController@show')->name('show.user');
Route::get('/users/{user}/followers', 'UsersController@showFollowers')->name('show.followers');
Route::get('/users/{user}/following', 'UsersController@showFollowing')->name('show.following');
Route::put('/{user}/update', 'UsersController@update')->name('update.user');
Route::post('/{user}/delete', 'UsersController@deletePhoto')->name('delete.photo');
Route::post('/{user}/book', 'BooksController@store')->name('store.book');
Route::get('/users/{user}/{book}', 'BooksController@show')->name('show.book');
Route::post('/{user}/follow', 'UsersController@followUser')->name('follow.user');
Route::post('/{user}/unfollow', 'UsersController@unfollowUser')->name('unfollow.user');
