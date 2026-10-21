<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;

Route::get('/', [CatalogController::class, 'index'])->name('home');
Route::get('/boutique', [CatalogController::class, 'index'])->name('catalog');
