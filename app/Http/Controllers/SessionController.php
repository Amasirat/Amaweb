<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SessionController extends Controller
{
    public function index()
    {
        return view("user.login");
    }

    public function store(Request $request)
    {

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
