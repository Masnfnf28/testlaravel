<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TendaController;
use App\Http\Controllers\WardrobeController;
use Illuminate\Support\Facades\Route;

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Client resource (otomatis mencakup semua method: index, create, store, update, destroy, dll)
Route::resource('client', ClientController::class)->middleware('auth');

// Tenda, Wardrobe, Album resource routes
Route::resource('tenda', TendaController::class)->middleware('auth');
Route::resource('wardrobe', WardrobeController::class)->middleware('auth');
Route::resource('album', AlbumController::class)->middleware('auth');

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile (edit, update, delete)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth routes (login, register, dll)
require __DIR__ . '/auth.php';
