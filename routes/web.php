<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@home');
Route::get('about', 'HomeController@about');
Route::get('links', 'HomeController@links');
Route::get('generators', 'HomeController@generators');
Route::get('network', 'HomeController@network');
Route::get('color-picker/{color?}', 'HomeController@colorPicker');

Route::post('tool/generate-hash', 'ToolController@generateHash');
Route::post('tool/generate-pass', 'ToolController@generatePass');
Route::post('tool/encoder', 'ToolController@encoder');
Route::post('tool/text-transform', 'ToolController@textTransform');
