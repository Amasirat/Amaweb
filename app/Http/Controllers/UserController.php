<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Auth\Events\Registered;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view("user.register");
    }

    public function show()
    {
        return view("user.panel", [
            "user" => Auth::user()
        ]);
    }
    public function store(Request $request)
    {
        $attributes = $request->validate([
            "username" => ["required", "unique:users,username"],
            "email" => ["required", "email", "unique:users,email"],
            "password" => ["confirmed", "required", Password::min(6)->letters()->numbers()]
        ]);

        $user = User::create($attributes);

        Auth::login($user);

        event(new Registered($user));

        return redirect("/email/verify");
    }

    public function edit(Request $request)
    {
        $attributes = $request->validate([
            "image" => ["required"]
        ]);

        $user = Auth::user();

        if($user->profile_pic != null)
        {
            if(file_exists(public_path().'/storage/'.$user->profile_pic))
            {
                unlink(public_path().'/storage/'.$user->profile_pic);
            }
        }

        $imagePath = $attributes["image"]->store('users');

        User::where("id", $user->id)->update(array("profile_pic" => $imagePath));

        return redirect("/panel");
    }
    public function destroy(User $user)
    {
        // TODO
    }
}
