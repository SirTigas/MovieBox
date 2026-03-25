<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class RegisterController extends Controller
{
    public function index(){
        return Inertia::render('Auth/Register');
    }

    //Create a new user
    public function store(Request $request){

        //Validate fields
        $credentials = $request->validate([
            'name' => 'required|min:3|max:10',
            'email' => 'required|email|lowercase|unique:users',
            'password' => 'required|min:4|confirmed',
        ]);

        //Create User
        $user = User::create($credentials);

        //verification email

        //Login user
        Auth::login($user);

        //Redirect
        return redirect()->route('home');
    }
}
