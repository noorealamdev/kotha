<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::orderBy('id','desc')->get();

        return view('backend.page.index', compact('pages'));

    }

    public function create()
    {
        return view('backend.page.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
        ]);

        $page = new Page();
        $page->title = $request->input('title');
        $page->content = $request->input('content');
        $page->status = $request->get('status');
        $page->save();

        return redirect()->route('page.index')->with(['msg' => 'Page Created Successfully', 'type' => 'success']);
    }

    public function edit($id)
    {
        $page = Page::find($id);

        return view('backend.page.edit', compact('page'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
        ]);

        $page = Page::find($id);

        $page->title = $request->input('title');
        $page->content = $request->input('content');
        $page->status = $request->get('status');

        $page->save();

        return redirect()->route('page.edit', $page->id)->with(['msg' => 'Page Updated Successfully', 'type' => 'success']);
    }

    public function destroy($id)
    {
        $page = Page::find($id);
        $page->delete();

        return redirect()->route('page.index')->with(['msg' => 'Page Deleted Successfully', 'type' => 'success']);
    }
}
