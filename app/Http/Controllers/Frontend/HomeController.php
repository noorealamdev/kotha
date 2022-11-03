<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Settings;
use Harimayco\Menu\Models\Menus;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $settings = Settings::where('settings_id', 1)->first();

        $hero_posts = Post::with(['category', 'user'])->where('status', 'published')->take(4)->orderBy('id','desc')->get();

        $hero_featured_post = Post::with(['category', 'user'])->where('status', 'published')->where('featured_post', '1')->take(1)->get();

        $editor_picked = Post::with(['category', 'user'])->where('status', 'published')->where('editor_pick', '1')->take(5)->get();

        $trending = Post::with(['category', 'user'])->where('status', 'published')->take(6)->inRandomOrder()->get();

        $carousel = Post::with(['category', 'user'])->where('category_id', $settings ? $settings->home_ctaegory_id : null)->where('status', 'published')->orderBy('id','desc')->get();

        $latestPosts = Post::with(['category', 'user'])
            ->where('status', 'published')
            ->orderBy('id','desc')
            ->paginate(10);


        return Inertia::render('Index', [
            'latestPosts' => $latestPosts,
            'heroPosts' => $hero_posts,
            'heroFeaturedPost' => $hero_featured_post,
            'editorPicked' => $editor_picked,
            'trending' => $trending,
            'carousel' => $carousel,
        ]);

    }

}
