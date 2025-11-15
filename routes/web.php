<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Products\Index as ProductsIndex;
use App\Livewire\Cart\Index as CartIndex;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect()->route('products.index');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');
    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');
});

Route::middleware('auth')->group(function () {
    Route::get('/products', function () {
        return view('products.index');
    })->name('products.index');
    Route::get('/cart', function () {
        return view('cart.index');
    })->name('cart.index');
    
    Route::post('/logout', function () {
        Auth::logout();
        return redirect()->route('login');
    })->name('logout');
});
