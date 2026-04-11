<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
USE App\Models\User;

class ProfileEditController extends Controller
{
    //Display profile sections
    public function index(){
        return Inertia::render("Profile/Profile", [
            'status' => session('status'),
        ]);
    }

    //Update email
    public function updateInfo(Request $request){
        //validate inputs
        $fields = $request->validate([
            'email' => [
                'required',
                'email',
                Rule::unique(User::class)->ignore($request->user()->id),
            ],

            'name' => [
                'required',
                'min:3',
                'max:10',
            ],
        ]);

        //update infos
        $request->user()->fill($fields);

        //unverified user if email update
        if($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        //save changes
        $request->user()->save();




        return redirect()->route('profile.edit')->with('status', 'Profile updated successfully.');
    }
}
