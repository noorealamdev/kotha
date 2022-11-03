<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Settings;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Laravelista\Comments\Comment;

class PostSingleController extends Controller
{
    public function single($slug)
    {

        $singlePost = Post::with(['category', 'user'])->where('slug', $slug)->get()[0];
        //dd($singlePost);

        Post::find($singlePost->id)->increment('view_count');

        $comments = Comment::where('commentable_id', $singlePost->id)->get();

        return Inertia::render('SinglePostPage', [
            'singlePost' => $singlePost,
            'comments' => $comments,
        ]);
    }
}
