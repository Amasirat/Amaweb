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

        // TODO: Do a proper job of handling exception
        if(! Auth::attempt($attributes))
        {
            throw new ValidationException("Failed to login...Were your details correct?");
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
