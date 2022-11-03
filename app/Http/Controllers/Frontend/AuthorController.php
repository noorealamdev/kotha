<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AuthorController extends Controller
{
    public function author($name)
    {

        $settings = Settings::where('settings_id', 1)->get()[0];
        $carouselSidebar = Post::with(['category', 'user'])->where('category_id', $settings->sidebar_ctaegory_id)->where('status', 'published')->orderBy('id','desc')->get();
        $popularPosts = Post::orderBy('view_count', 'desc')->take(3)->get();

        $user = User::where('name', $name)->get();
        //dd($user);

        $authorPosts = Post::with(['user', 'category'])
            ->where('user_id', $user[0]->id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        return Inertia::render('AuthorPage', [
            'authorPosts' => $authorPosts,
            'carouselSidebar' => $carouselSidebar,
            'popularPosts' => $popularPosts,
            'settings' => $settings,
        ]);
    }
}
