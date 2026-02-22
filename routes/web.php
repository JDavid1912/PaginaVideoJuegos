<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Link', function () {
    return view('Link');
});
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

