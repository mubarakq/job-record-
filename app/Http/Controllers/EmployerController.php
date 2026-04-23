<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function index()
    {
        // return view('employers.index');
    }

    public function create()
    {
        // return view('employers.create');
    }

    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'company_name' => 'required|string|max:255',
        //     'company_logo' => 'required|image|mimetypes:image/jpeg,image/png,image/webp|max:2048',
        //     'company_website' => 'nullable|string|url|max:255',
        // ]);

        // $logoPath = $request->file('company_logo')->store('logos', 'public');

        // Employer::create([
        //     'company_name' => $validatedData['company_name'],
        //     'company_logo' => $logoPath,
        //     'company_website' => $validatedData['company_website'] ?? null,
        // ]);

        // return redirect()->route('employers.index');
    }

    public function show(Employer $employer)
    {
        // return view('employers.show', compact('employer'));
    }

    public function edit(Employer $employer)
    {
        // return view('employers.edit', compact('employer'));
    }

    public function update(Employer $employer)
    {
        // $validatedData = $request->validate([
        //     'company_name' => 'required|string|max:255',
        //     'company_logo' => 'nullable|image|mimetypes:image/jpeg,image/png,image/webp|max:2048',
        //     'company_website' => 'nullable|string|url|max:255',
        // ]);

        // if ($request->hasFile('company_logo')) {
        //     $logoPath = $request->file('company_logo')->store('logos', 'public');
        //     $employer->company_logo = $logoPath;
        // }
        // Employer::update([
        //     'company_name' => $validatedData['company_name'],
        //     'company_website' => $validatedData['company_website'] ?? null,
        // ]);

        // section above is for mass assignment, below is for individual assignment
        // $employer->company_name = $validatedData['company_name'];
        // $employer->company_website = $validatedData['company_website'] ?? null;
        // $employer->save();

        // return redirect()->route('employers.show', $employer);
    }

    public function destroy(Employer $employer)
    {
        // $employer->delete();
        // return redirect()->route('employers.index');
    }
}
