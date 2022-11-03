<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Http\Request;
use Laravelista\Comments\Comment;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = Post::all()->count();
        $categories = Category::all()->count();
        $pages = Page::all()->count();
        $comments = Comment::all()->count();

        return view('backend.dashboard.index', compact('posts', 'categories', 'pages', 'comments'));
    }
}
