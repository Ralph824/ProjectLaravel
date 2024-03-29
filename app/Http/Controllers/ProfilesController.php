<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index(\App\Models\User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        // $user = \App\Models\User::findOrFail($user);
        return view('profiles.index', compact('user', 'follows'));
    }

    public function edit(\App\Models\User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }
    public function update(\App\Models\User $user)
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);
        
        if(request('image')){
            $imagePath = request('image')->store('profile', 'public');
            
            $imageArray = ['image' => $imagePath];
        }
        
        auth()->user()->profile->update(array_merge(
            $data,
           $imageArray ?? []
        ));

        return redirect("/profile/{$user->id}");
    }
}

