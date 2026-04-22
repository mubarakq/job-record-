<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get all jobs with their associated tags and employers, and paginate the results
        $jobs = Job::whereHas('tags')
                    ->whereHas('employer')
                    ->with('tags', 'employer')
                    ->latest()
                    ->paginate(10);

        // return view('jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'employer_id' => 'required|exists:employers,ulid',
            'title' => 'required|string|max:255',
            'salary' => 'required|string',
            'tags' => 'string|nullable',
        ]);

        DB::transaction(function () use ($validatedData) {
            $job = Job::create([
                'employer_id' => $validatedData['employer_id'],
                'title' => $validatedData['title'],
                'salary' => $validatedData['salary'],
            ]);

            if (!empty($validatedData['tags'])) {
                $job->tags()->attach($job->tagSorter($validatedData['tags']));
            }
        });



        // return redirect()->route('jobs.show', $job);
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $jobs)
    {
        // $job = Job::with('tags', 'employer')->findOrFail($jobs->id);
        // return view('jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $jobs)
    {
        $job = Job::with('tags', 'employer')->findOrFail($jobs->id);
        // return view('jobs.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $jobs)
    {
        $validatedData = $request->validate([
            'employer_id' => 'required|exists:employers,ulid',
            'title' => 'required|string|max:255',
            'salary' => 'required|string',
            'tags' => 'string|nullable',
        ]);

        DB::transaction(function () use ($validatedData, $jobs) {
            $jobs->update([
                'employer_id' => $validatedData['employer_id'],
                'title' => $validatedData['title'],
                'salary' => $validatedData['salary'],
            ]);  

            if (isset($validatedData['tags'])) {
                $jobs->tags()->sync($jobs->tagSorter($validatedData['tags']));
            }
        });

        // return redirect()->route('jobs.show', $jobs);

    }

    
    public function destroy(Job $jobs)
    {
        $jobs->delete();
        // return redirect()->route('jobs.index');
    }
}
 