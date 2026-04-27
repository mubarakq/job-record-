<?php

namespace App\Http\Controllers;

use App\Models\Job;

class SearchController extends Controller
{
    public function __invoke()
    {
        $query = request('query');

        $job = Job::where(function ($q) use ($query) {
            $q->where('title', 'like', '%' . $query . '%');
            $q->orWhere('salary', 'like', '%' . $query . '%');
            $q->orWhereHas('employer', function ($q) use ($query) {
                $q->where('company_name', 'like', '%' . $query . '%');
            });
            $q->orWhereHas('tags', function ($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%');
            });
        })
            ->with(['employer', 'tags'])
            ->latest()
            ->paginate(10);
        if ($job->isEmpty()) {
            // return view('search.results', ['message' => 'No results found']);
        }
        
        // return view('search.results', compact('job'));
        // return view('search.results', [
        //     'jobs' => $job,
        // ]);
    }

    // public function search(Request $request)
    // {
    //     $query = $request->input('query');

    //     // Perform search logic here, e.g., query the database for matching records
    //     // For example, you could search for jobs or users based on the query

    //     // Return search results to a view or as a JSON response
    //     // return view('search.results', compact('results'));
    // }
}
