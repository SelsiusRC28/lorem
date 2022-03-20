<?php

namespace App\Http\Controllers;

use App\Models\Foro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ForoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foros = Foro::with('user')->get();

        return Inertia::render('Web/Foro', [
            'foros' => $foros
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

        $post = new Foro();
        $post->title = $request->title;
        $post->content = $request->text;
        $post->img = $image_path;

        $post->user_id = $request->id;


        $post->save();

        request()->session()->flash('message', 'Holaaaaaaaaa');

        return Redirect::route('inicio');
    }


    public function like(Request $request){


        $id = $request->id;
        $post = Foro::find($id);
        $post->likes+= 1;
        $post->save();
        return back();
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
        //
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
        //
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
