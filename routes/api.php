<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::namespace('App\Http\Controllers')->group(function () {
    Route::get('/persons', 'PersonController@index');
    Route::get('/persons/show/{person}', 'PersonController@show');
    Route::post('/persons/store', 'PersonController@store');
    Route::patch('/persons/update/{person}', 'PersonController@update');
    Route::delete('/persons/delete/{person}', 'PersonController@destroy');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
