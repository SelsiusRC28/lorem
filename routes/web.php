<?php

use App\Http\Controllers\CursoController;
use App\Http\Controllers\ForoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\WebController;
use App\Models\Curso;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use GuzzleHttp\Psr7\Request;
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

Route::middleware(['auth:sanctum', 'verified', 'role'])->group(function () {
    Route::get('home', [WebController::class, 'inicio'])->name('inicio');

    Route::get('chat', function(){
        return Inertia::render('Web/Chat');
    });

    Route::get('foro', [ForoController::class, 'index']);
    Route::post('foro', [ForoController::class, 'store'])->name('foro-post');

    Route::get('aprender', [WebController::class, 'aprender']);

    Route::get('aprender/{id}', [CursoController::class, 'index'])->name('aprender-id');

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

    Route::get('role/{id}', [RoleController::class, 'edit'])->name('role-edit');

    Route::put('role/{id}', [RoleController::class, 'update'])->name('role-role');

    Route::get('carbon', function(){
         $now =  Carbon::now();
         $now2 =  Carbon::now();
         echo $now->addDay(10);
         echo "<br>";
         echo $now2;
         echo "<br>";
         echo "<br>";
         echo $now->diffInDays($now2);
    });


});

