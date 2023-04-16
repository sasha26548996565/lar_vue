<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::namespace('App\Http\Controllers')->group(function () {
    Route::get('/persons', 'PersonController@index')->name('post.index');
    Route::post('/persons/store', 'PersonController@store')->name('post.store');
    Route::patch('/persons/update/{person}', 'PersonController@update')->name('post.update');
    Route::delete('/persons/delete/{person}', 'PersonController@destroy')->name('post.destroy');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
