<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function index()
    {
        return view("user.login");
    }

    public function store(Request $request)
    {
        // TODO More validation options
        $attributes = $request->validate([
            "username" => ["required"],
            "password" => ["required"]
        ]);

        Auth::attempt($attributes);

        request()->session()->regenerate();

        return redirect('/blogs');
    }

    public function edit()
    {

    }

    public function destroy()
    {
        // todo
        return redirect('/');
    }
}
