<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('users.index');
    }

    public function edit(User $user)
    {
        // return view('users.edit', compact('user'));
    }   

    // public function update(Request $request, User $user)
    // {
        // $validatedData = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        // ]);


        // User::update($validatedData)->$user;//wrong syntax, need to update the user instance

        // $user->update($validatedData); //correct syntax to update the user instance


        // return redirect()->route('users.index');
    // }

    public function update(Request $request, User $user)
{
    // abort_if(auth()->id() !== $user->id, 403);

    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $user->ulid . ',ulid',
    ]);

    $user->update($validatedData);

    return redirect()->back()->with('success', 'Profile updated');
}

        /**
        * Remove the specified resource from storage.
        */
        public function destroy(User $user)
        {
            // user disable account instead of deleting it, to preserve data integrity and allow for potential reactivation in the future
            // $user->update(['active' => false]);
        
            // $user->delete(); //correct syntax to delete the user instance
            // return redirect()->route('users.index');
        }

}
