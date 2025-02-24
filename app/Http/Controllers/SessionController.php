<?php

namespace App\Http\Controllers;

use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function index()
    {
        return view("user.login");
    }

    public function get_usr_blogs()
    {
        return view("user.blogs", [
            "blogs" => Auth::user()->blogs
        ]);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            "username" => ["required", "exists:users,username"],
            "password" => ["required"]
        ]);

        if(! Auth::attempt($attributes))
        {
            return redirect()->back()->withErrors([
                'password' => 'Wrong password, are you sure this is it?',
            ]);
        }

        request()->session()->regenerate();

        return redirect('/blogs');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/');
    }
}
