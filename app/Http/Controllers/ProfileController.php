<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ProfileController extends Controller
{
    public function update(Request $request, $id){

        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048'
        ]);


        $image_path = '';

        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('image', 'public');
        }

        $profile = User::find($id);
        $profile->image = $image_path;
        $profile->save();

        request()->session()->flash('message', 'Holaaaaaaaaa');

        return Redirect::route('profile');


    }
}
