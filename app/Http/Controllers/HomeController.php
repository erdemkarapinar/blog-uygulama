<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->take(4)->get();

        return view('home.index', compact('posts'));
    }

    public function categories()
    {
        $categories = Category::all();
        return view('home.category', compact('categories'));
    }

    public function showCategory(Category $category)
    {
        $posts = $category->posts()->latest()->get();
        return view('home.category_posts', compact('category', 'posts'));
    }

    public function showAuthor(User $user)
    {
        $posts = $user->posts()->latest()->get();
        return view('home.author', compact('user', 'posts'));
    }
}
