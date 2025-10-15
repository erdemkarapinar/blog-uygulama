<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class SearchController extends Controller
{
    $query = $request->input('query');

        $results = Post::where('title', 'LIKE', "%{$query}%")
                        ->orWhere('body', 'LIKE', "%{$query}%")
                        ->get();

        return view('home.search_results', compact('results', 'query'));
}
