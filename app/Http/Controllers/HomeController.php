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
        return view('homes.index', compact('posts'));
    }

    public function showCategory(Category $category)
    {
        $posts = $category->posts()->latest()->get();
        return view('homes.category_posts', compact('category', 'posts'));
    }

    public function showAuthor(User $user)
    {
        $posts = $user->posts()->latest()->get();
        return view('homes.user_profile', compact('user', 'posts'));
    }
}
