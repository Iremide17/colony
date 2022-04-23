<?php

namespace App\Http\Controllers\Pages;

use App\Models\User;
use App\Models\Property;
use App\Models\Favourite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    
    public function profile(User $user)
    {
        return view('pages.user.profile', [
            'user' => $user
        ]);
    }

    public function job(User $user)
    {
        return view('pages.user.job', [
            'user' => $user
        ]);
    }

    public function favourite(User $user)
    {
        $favourites = Favourite::where('user_id', $user->id())->get();
    
        return view('pages.user.favourite', [
            'user' => $user,
            'favourites'  => $favourites
        ]); 
    }

}