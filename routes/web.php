<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

Route::redirect('/', '/home');

Route::middleware(['auth', 'verified'])->prefix('home')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::post('/category', 'HomeController@storeCategory')->name('home.store.category');
    Route::post('/transaction', 'HomeController@storeTransaction')->name('home.store.transaction');

    Route::patch('/category/{category}', 'HomeController@updateCategory')->name('home.update.category');
    Route::patch('/transaction/{transaction}', 'HomeController@updateTransaction')->name('home.update.transaction');

    Route::delete('/category/{category}', 'HomeController@deleteCategory')->name('home.delete.category');
    Route::delete('/transaction/{transaction}', 'HomeController@deleteTransaction')->name('home.delete.transaction');
});

Route::middleware(['auth', 'verified'])->prefix('profile')->group(function () {
    Route::get('/', 'ProfileController@index')->name('profile');

    Route::patch('/{user}/name', 'ProfileController@updateName')->name('profile.update.name');
    Route::patch('/{user}/pass', 'ProfileController@updatePass')->name('profile.update.pass');
});
