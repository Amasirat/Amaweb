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
        $attributes = $request->validate([
            "username" => ["required"],
            "password" => ["required"]
        ]);

        if(Auth::attempt($attributes))
        {
            dd("passed");
        }
        else
        {
            dd("failed");
        }

        redirect('/blogs');
    }

    public function edit()
    {

    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }
}
