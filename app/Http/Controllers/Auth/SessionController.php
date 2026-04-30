<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        if (!Auth::attempt($validatedData, $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'error' => 'Email or password is incorrect.',
            ]);
        }
        // if (Auth::user()->email_verified_at === null) {
        //     return redirect()->route('verification.notice')->with('error', 'Please verify your email before logging in.');
        // }
        // Auth::user()->email_verified_at;
        $request->session()->regenerate();
        return redirect()->intended('dashboard');
    }

   
    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        // Auth::logout();
        // return redirect()->route('home');
    }
}
