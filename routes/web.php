<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PostController;
use App\Models\Post;

Route::get('/Post', function () {
    return view('views.welcome');
});

Route::get('/', function () {
    return view('welcome');
});
 
Route::get('/Link', function () {
    return view('Link');
});

Route::middleware('auth')->group(function () {
    Route::resource('posts', PostController::class);
});

Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store'])
->middleware('throttle:5,1')
->name('login.store');

Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard.index');

}
)->middleware('auth')->name('dashboard.index');

Route::get('/assasins', function () {
    return view('Juegos.Assasins');
    
});
Route::get('/shadows', function () {
    return view('Juegos.Shadow');
    
});
Route::get('/Cyberpunk', function () {
    return view('Juegos.cyberpunk');
    
});
Route::get('/highonlife2', function () {
    return view('Juegos.HighOnLife2');
    
});
Route::get('/Call', function () {
    return view('Juegos.call');
});

