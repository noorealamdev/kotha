<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PageSingleController extends Controller
{
    public function single($page_slug)
    {

        $singlePage = Page::where('status', 'published')->where('slug', $page_slug)->first();
        //dd($singlePage);

        if ($singlePage != null ) {
            return Inertia::render('Page', [
                'singlePage' => $singlePage,
            ]);
        }
        else {
            abort(404);
        }

    }
}
