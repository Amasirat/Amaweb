<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
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

    public function create(User $user)
    {

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

        return redirect("/");
    }

    public function edit_image(Request $request)
    {
        $attributes = $request->validate([
            "image" => ["required"]
        ]);

        $user = Auth::user();

        $imagePath = $attributes["image"]->store('users');

        User::where("id", $user->id)->update(array("profile_pic" => $imagePath));

        return redirect("/panel");
    }

    public function edit(User $user)
    {
        // TODO
    }
    public function destroy(User $user)
    {
        // TODO
    }
}
