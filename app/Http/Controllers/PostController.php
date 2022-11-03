<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('status', 1)->orderBy('name')->get();

        $posts = Post::orderBy('id','desc')->get();

        if (count($categories) > 0)
        {
            return view('backend.post.index', compact('posts', 'categories'));
        }
        else{
            return redirect()->route('category.create')->with(['msg' => 'Please create post category first', 'type' => 'info']);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('backend.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'slug' => 'required|string',
            'category_id' => 'required',
            'featured_image' => 'nullable',
        ]);

        $post = new Post();
        $post->title = $request->input('title');
        $post->category_id = $request->get('category_id');
        $post->user_id = Auth::user()->id;
        $post->status = $request->get('status');
        $post->featured_post = $request->get('featured_post') == 'on' ? 1 : 0 ;
        $post->editor_pick = $request->get('editor_pick') == 'on' ? 1 : 0 ;
        $post->content = $request->input('content');
        $post->excerpt = $request->input('excerpt');
        $post->seo_title = $request->input('seo_title');
        $post->seo_keyword = $request->input('seo_keyword');
        $post->seo_desc = $request->input('seo_desc');

        if($request->hasFile('featured_image')) {
            $inputImage = $request->file('featured_image');
            $imageName = time() . '.' . $inputImage->extension();
            // Delete Image
            File::delete('uploads/'.$post->featured_image);
            $inputImage->move(public_path('uploads'), $imageName);
            $post->featured_image = $imageName;
        }

        $post->save();

        return redirect()->route('post.index')->with(['msg' => 'Post Created Successfully', 'type' => 'success']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::orderBy('name')->get();
        $post = Post::find($id);

        return view('backend.post.edit', compact('post', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'slug' => 'required|string',
            'category_id' => 'required',
            'featured_image' => 'nullable',
        ]);

        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->get('category_id');
        $post->user_id = Auth::user()->id;
        $post->status = $request->get('status');
        $post->featured_post = $request->get('featured_post') == 'on' ? 1 : 0 ;
        $post->editor_pick = $request->get('editor_pick') == 'on' ? 1 : 0 ;
        $post->content = $request->input('content');
        $post->excerpt = $request->input('excerpt');
        $post->seo_title = $request->input('seo_title');
        $post->seo_keyword = $request->input('seo_keyword');
        $post->seo_desc = $request->input('seo_desc');

        if($request->hasFile('featured_image')) {
            $inputImage = $request->file('featured_image');
            $imageName = time() . '.' . $inputImage->extension();
            // Delete Image
            File::delete('uploads/'.$post->featured_image);
            $inputImage->move(public_path('uploads'), $imageName);
            $post->featured_image = $imageName;
        }

        $post->save();

        return redirect()->route('post.edit', $post->id)->with(['msg' => 'Post Updated Successfully', 'type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        File::delete('uploads/'.$post->featured_image);
        $post->delete();
        return redirect()->route('post.index')->with(['msg' => 'Deleted Post Successfully', 'type' => 'success']);
    }


    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }

}
