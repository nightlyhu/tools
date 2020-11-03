<?php

use App\Http\Controllers\DnsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ToolController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home']);
Route::get('about', [HomeController::class, 'about']);
Route::get('links', [HomeController::class, 'links']);
Route::get('generators', [HomeController::class, 'generators']);
Route::get('network', [HomeController::class, 'network']);
Route::get('dns/{domain?}', [DnsController::class, 'index']);
Route::get('color-picker/{color?}', [HomeController::class, 'colorPicker']);

Route::prefix("tool")->group(function () {
    Route::post('generate-hash', [ToolController::class, 'generateHash']);
    Route::post('generate-pass', [ToolController::class, 'generatePass']);
    Route::post('encoder', [ToolController::class, 'encoder']);
    Route::post('text-transform', [ToolController::class, 'textTransform']);
});
