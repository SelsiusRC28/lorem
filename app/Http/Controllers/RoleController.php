<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Symfony\Contracts\Service\Attribute\Required;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles')->orderBy('id', 'DESC')->get();
        return Inertia::render('Web/Role', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'title' => 'required',
            'text' => 'required|min:20',

        ]);

        $image_path = '';

        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('image', 'public');
        }

        $post = new Anuncio();
        $post->title = $request->title;
        $post->text = $request->text;
        $post->img = $image_path;

        $post->user_id = $request->id;


        $post->save();

        request()->session()->flash('message', 'Holaaaaaaaaa');

        return Redirect::route('inicio');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        return Inertia::render('Web/Edit', [
            'users' => $users
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $user = User::find($id);

        if($request->role['saldo'] != $user->credit){
            $now = Carbon::now();
            $user->credit += $request->role['saldo'];
            $user->save();
            request()->session()->flash('message', 'Holaaaaaaaaa');
            return Redirect::route('role');
        }

        if($request->role['rango'] == 'Vip'){
            $user->credit += 1500;
            $now = Carbon::now();
            $user->days = $now->addDays(30);
        }elseif($request->role['rango'] == 'Seller'){
            $user->credit = null;
            $now = Carbon::now();
            $user->days = $now->addDays(5);
        }elseif($request->role['rango'] == 'Admin'){
            $user->credit = 9999;
            $now = Carbon::now();
            $user->days = $now->addDays(9999);
        }

        $user->assignRole($request->role['rango']);
        $user->save();

        request()->session()->flash('message', 'Holaaaaaaaaa');

        return Redirect::route('role');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
