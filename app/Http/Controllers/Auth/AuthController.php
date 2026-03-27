<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //Return Login page
    public function index(){
        return Inertia::render('Auth/Login', [
            'status' => session('status'),
        ]);
    }

    public function store(Request $request){
        //Validate request
        $credentials = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);

        //Create a new session
        if(Auth::attempt($credentials, $request->remember)){
            $request->session()->regenerate();

            return redirect()->route('home');
        }

        //Error case
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    //Logging out user
    public function logout(Request $request){
        //Logout
        Auth::logout();

        //Invalidate session
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
