<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class ProfileEditController extends Controller
{
    //Display profile sections
    public function index(){
        return Inertia::render("Profile/Profile");
    }

    //Update email
    public function updateEmail(){
        echo 'test';
    }
}
