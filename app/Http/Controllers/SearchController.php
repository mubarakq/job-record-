<?php

namespace App\Http\Controllers;

use App\Models\Job;

class SearchController extends Controller
{
    public function __invoke()
{
    $query = request('query');

    if (empty(trim($query))) {
        return redirect()->back();
    }

    $jobs = Job::where(function ($q) use ($query) {
        $q->where('title', 'like', "%{$query}%")
          ->orWhere('salary', 'like', "%{$query}%")
          ->orWhereHas('employer', function ($q) use ($query) {
              $q->where('company_name', 'like', "%{$query}%");
          })
          ->orWhereHas('tags', function ($q) use ($query) {
              $q->where('name', 'like', "%{$query}%");
          });
    })
    ->with(['employer', 'tags'])
    ->latest()
    ->paginate(10);// query the jobs table for records where the title or salary matches the search query, or where the related employer's company name matches the search query, or where the related tags' names match the search query. Then eager load the employer and tags relationships, order the results by latest, and paginate the results with 10 items per page.

    // return view('search.results', compact('jobs'));
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
