<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    public function updatePassword(Request $request){
        //validate input
        $fields = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'string', 'min:8','max:20', 'confirmed'],
        ]);

        //update password
        $request->user()->password = Hash::make($fields['password']);
        $request->user()->save();

        return redirect()->route('profile.edit');
    }

    public function destroy(Request $request){
        $fields = $request->validate([
            'password' => ['required', 'current_password'],
        ]);
        $user = $request->user();

        //Logout and destroy user
        Auth::logout($user);
        User::destroy($user->id);

        //Invalidate session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
