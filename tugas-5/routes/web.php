<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VariantController;
use App\Http\Controllers\SiteController;

Route::get('/login', function () {
    if (Auth::check()) {
        return redirect('/products');
    }

    return view('login');
})->name('login');

Route::post('/auth', [SiteController::class, 'auth']);

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});

Route::resource('products', ProductController::class)
    ->middleware('auth');

Route::get('/products/{product}/variants/create',
    [VariantController::class, 'create'])
    ->name('variants.create')
    ->middleware('auth');

Route::post('/products/{product}/variants',
    [VariantController::class, 'store'])
    ->name('variants.store')
    ->middleware('auth');