<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Settings;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ArchiveController extends Controller
{
    public function archive($category_slug)
    {

        $settings = Settings::where('settings_id', 1)->get()[0];
        $carouselSidebar = Post::with(['category', 'user'])->where('category_id', $settings->sidebar_ctaegory_id)->where('status', 'published')->orderBy('id','desc')->get();

        $category = Category::where('category_slug', $category_slug)->get();
        //dd($category[0]->id);

        $archivePosts = Post::with(['user', 'category'])
            ->where('category_id', $category[0]->id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        $popularPosts = Post::orderBy('view_count', 'desc')->take(3)->get();

        return Inertia::render('ArchivePage', [
            'archivePosts' => $archivePosts,
            'popularPosts' => $popularPosts,
            'carouselSidebar' => $carouselSidebar,
            'settings' => $settings,
        ]);
    }
}
