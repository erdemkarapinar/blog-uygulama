<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class SearchController extends Controller
{
    public function search(Request $request){


        $query = $request->input('query');

        $results = Post::where('title', 'LIKE', "%{$query}%")
                        ->orWhere('content', 'LIKE', "%{$query}%")
                        ->get();

        return view('homes.search_results', compact('results', 'query'));

    }
}
