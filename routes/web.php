<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('upload');
});
use App\Http\Controllers\ImageController;

Route::get('/images', [ImageController::class, 'showImages'])->name('show.images');
Route::post('/upload-image', [ImageController::class, 'uploadImage'])->name('upload.image');
