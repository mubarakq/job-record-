<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
// use App\Models\Employer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required|string|min:8|confirmed',
        // ]);

        // $validatedEmployerData = $request->validate([
        //     'company_name' => 'required|string|max:255',
        //     'company_logo' => 'required|image|mimetypes:image/jpeg,image/png,image/webp|max:2048',
        //     'company_website' => 'nullable|string|url|max:255',
        // ]);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'company_name' => 'required|string|max:255',
            'company_logo' => 'image|mimeTypes:image/jpeg,image/png,image/webp|max:2048',
            'company_website' => 'nullable|string|url|max:255',
        ]);

        $logoPath = $request->file('company_logo')->store('logos', 'public');
        // $validatedData, $validatedEmployerData

        // Create the user
        $user = DB::transaction(function () use ($validated, $logoPath) {
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);

            $user->employer()->create([
                'company_name' => $validated['company_name'],
                'company_logo' => $logoPath,
                'company_website' => $validated['company_website'] ?? null,
            ]);

            return $user; // ✅ return it

            // avoid using the create method for the user and employer, as it may cause issues with the relationships and transactions. Instead, we can create the user and employer instances separately and then associate them together.
            // $user = new User();
            // $user->name = $validated['name'];
            // $user->email = $validated['email'];
            // $user->password = Hash::make($validated['password']);
            // $user->save();
            
            // for employer creation, we can use the relationship method to create the employer associated with the user
            // $employer = new Employer();
            // $employer->user_id = $user->id;
            // $employer->company_name = $validated['company_name'];
            // $employer->company_logo = $logoPath;
            // $employer->company_website = $validated['company_website'] ?? null;
            // $employer->save();

            
        });



        // Log the user in
        Auth::login($user);

        // Redirect to the intended page
        return redirect()->intended('dashboard');
    }
}
