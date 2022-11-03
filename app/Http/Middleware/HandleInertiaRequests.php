<?php

namespace App\Http\Middleware;

use App\Models\Category;
use App\Models\Post;
use App\Models\Settings;
use Harimayco\Menu\Models\Menus;
use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request)
    {
        $settings = Settings::where('settings_id', 1)->first();


        return array_merge(parent::share($request), [
            'menu' => Menus::where('name','Main')->with('items')->first(),
            'settings' => Settings::where('settings_id', 1)->first(),
            'popularPosts' => Post::orderBy('view_count', 'desc')->where('status', 'published')->take(3)->get(),

            'categories' => Category::with('posts')->where('status', 1)->get(),


            'carouselSidebar' => Post::with(['category', 'user'])->where('category_id', $settings ? $settings->sidebar_ctaegory_id : null)->where('status', 'published')->orderBy('id','desc')->get(),
        ]);
    }
}
