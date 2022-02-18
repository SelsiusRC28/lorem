<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\WebController;
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
    return Inertia::render('Web/Web', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('home', [WebController::class, 'inicio']);

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

    Route::get('checker', function(){
        return Inertia::render('Web/Checker');
    });

    Route::get('profile', function(){
        return Inertia::render('Web/Profile');
    })->name('profile');

    Route::post('profile/{id}', [ProfileController::class, 'update'])->name('profile-image');


    Route::get('image', function(){
        return Inertia::render('Web/Image');
    });

    Route::get('role', [RoleController::class, 'index'])->name('role');

    Route::post('role/{id}', [RoleController::class, 'store'])->name('role-anuncio');
});

