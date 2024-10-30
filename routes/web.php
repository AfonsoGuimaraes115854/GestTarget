<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/noticias', function () {
    return view('noticias');
});

Route::get('/categories', function () {
    $categories = Category::all();    
    return view('categories.index', compact('categories'));
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/parceiros', function () {
    return view('parceiros');
});

Route::get('/contactos', function () {
    return view('contactos');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/serviços', function () {
    return view('servicos');
});

Route::get('/equipamentos', function () {
    return view('equipamentos');
});

Route::get('/sobre', function () {
    return view('sobre');
});

Route::get('/organizations', function () {
    echo "Olá, encontraste uma página em construção.";
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});