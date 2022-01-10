<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::get('home', function(){
    return Inertia::render('Web/Inicio');
});

Route::get('chat', function(){
    return Inertia::render('Web/Chat');
});

Route::get('foro', function(){
    return Inertia::render('Web/Foro');
});

Route::get('aprender', function(){
    return Inertia::render('Web/Aprender');
});

Route::get('tienda', function(){
    return Inertia::render('Web/Tienda');
});


Route::get('carding', function(){
    return Inertia::render('Web/Carding');
});


