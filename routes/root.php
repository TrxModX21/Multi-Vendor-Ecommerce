<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\RootController;

/** Root Routes */
Route::get('dashboard', [RootController::class, 'dashboard'])->name('dashboard');
