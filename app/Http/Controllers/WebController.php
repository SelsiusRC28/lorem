<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\Curso;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WebController extends Controller
{
    public function inicio(){
        $posts = Anuncio::with('user')->get();

        return Inertia::render('Web/Inicio', [
            'posts' => $posts,
        ]);
    }

    public function aprender(){
        $cursos = Curso::all();
        return Inertia::render('Web/Aprender', [
            'cursos' => $cursos
        ]);
    }
}
