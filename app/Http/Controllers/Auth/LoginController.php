<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class LoginController extends Controller
{
    //

    /** 
     * Get user to authentication wiew
    */

    public function index() : View
    {
        return view('login');
    }

    /**
     * Handle an authentication attempt.
     */
    public function show(Request $request): RedirectResponse
    {
        $credentials = [
            "email" => $request -> email,
            "password" => $request -> password
        ];
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            if(Gate::allows('is-student'))
            {
               // dd('student');
                return redirect()-> route("updateStudent")/* intended('informations-identite-adresse-scolarite-etudiant') */;
            };

            if(Gate::allows('is-admin'))
            {
                return redirect()-> route('showSchools');
            };
            
        }
 
        return back()->withErrors([
            'credentials' => 'Les identifiants saisis sont incorrects : (',
        ])->onlyInput('email');
    }


    public function Logout(Request $request) : RedirectResponse
    {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect() -> route("showLogin");
    }
}