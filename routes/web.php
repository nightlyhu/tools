<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@home');
Route::get('about', 'HomeController@about');
Route::get('links', 'HomeController@links');
Route::get('generators', 'HomeController@generators');
Route::get('network', 'HomeController@network');
Route::get('color-picker/{color?}', 'HomeController@colorPicker');

Route::prefix("tool")->group(function () {
    Route::post('generate-hash', 'ToolController@generateHash');
    Route::post('generate-pass', 'ToolController@generatePass');
    Route::post('encoder', 'ToolController@encoder');
    Route::post('text-transform', 'ToolController@textTransform');
});
