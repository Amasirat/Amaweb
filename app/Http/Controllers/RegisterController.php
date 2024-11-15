<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view("user.register");
    }

    public function show()
    {

    }

    public function create(User $user)
    {

    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            "username" => ["required"],
            "email" => ["required", "email"],
            "password" => ["confirmed", "required"]
        ]);

        $user = User::create($attributes);

        Auth::login($user);

        return redirect("/");
    }

    public function edit(User $user)
    {

    }
    public function destroy(User $user)
    {

    }
}
