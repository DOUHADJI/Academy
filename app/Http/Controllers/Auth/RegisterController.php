<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    //

    public function index()
    {
        return view('register');
    }

    public function store(UserRequest $request) 
    {
        
        User::create([
            'email' => $request -> email,
            'password' => Hash::make($request -> password)
        ]);

        return redirect() -> route('showLogin');
        
    }
}