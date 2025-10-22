<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = auth()->user()->posts()->latest()->paginate(10);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $post = Post::create($data);

        
        if ($request->filled('categories')) {
            $post->categories()->sync($request->input('categories'));
        }

        
        if ($request->hasFile('image')) {
            $post->addMediaFromRequest('image')->toMediaCollection('images');
        }

        
        if ($post->published_at) {
            event(new \App\Events\PostPublished($post));
        }

        $titleLabel = $request->getLabel('title');

        return redirect()->route('posts.index')->with('success',"{$titleLabel} Post Created.");
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        
        $post->update($request->validated());

        
        if ($request->hasFile('image')) {
            $post->clearMediaCollection('images');
            $post->addMediaFromRequest('image')->toMediaCollection('images', 'public');
        }

        
        if ($request->filled('categories')) {
            $post->categories()->sync($request->categories);
        }

        $titleLabel = $request->getLabel('title');
        return redirect()->route('posts.index', $post)->with('success',"{$titleLabel} Post Updated.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success','Post Deleted.');
    }

    public function search(Request $request){


        $query = $request->input('query');

        $results = Post::where('title', 'LIKE', "%{$query}%")
                        ->orWhere('content', 'LIKE', "%{$query}%")
                        ->get();

        return view('homes.search_results', compact('results', 'query'));

    }
}
