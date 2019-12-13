<?php

Auth::routes();

Route::get('/', function () {
    return redirect('home');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/home/category', 'HomeController@storeCategory')->name('home.store.category');
Route::post('/home/transaction', 'HomeController@storeTransaction')->name('home.store.transaction');

Route::patch('/home/category/{category}', 'HomeController@updateCategory')->name('home.update.category');
Route::patch('/home/transaction/{transaction}', 'HomeController@updateTransaction')->name('home.update.transaction');

Route::delete('/home/category/{category}', 'HomeController@deleteCategory')->name('home.delete.category');
Route::delete('/home/transaction/{transaction}', 'HomeController@deleteTransaction')->name('home.delete.transaction');

Route::get('/profile', 'ProfileController@index')->name('profile');

Route::patch('/profile/{user}', 'ProfileController@update')->name('profile.update');
