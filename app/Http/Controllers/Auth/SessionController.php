<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */

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

        $request->session()->regenerate();
        // Auth::user()->email_verified_at;
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
