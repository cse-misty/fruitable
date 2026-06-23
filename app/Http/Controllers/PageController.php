<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use RealRashid\SweetAlert\Facades\Alert;

class PageController extends Controller
{

public function index()
{
    $pages = Page::latest()->get();
    return view('backend.admin.privacyPolicy.index', compact('pages'));
}
  public function create()
    {

        $pages = Page::all();
        return view('backend.admin.privacyPolicy.create', compact('pages'));
    }








public function store(Request $request)
{

    $request->validate([
        'slug'    => 'required|string|max:255',
        'title'   => 'required|string|max:255',
        'content' => 'required',

    ]);


    Page::updateOrCreate(
        ['slug' => $request->slug],
        [
            'title'   => $request->title,
            'content' => $request->content,

        ]
    );


    Alert::success('Success', 'Page Create successfully!')
        ->toast()
        ->position('top-end');


   return redirect()->route('pages.index'); 
}

public function show($slug)
{

    $page = Page::where('slug', $slug)->firstOrFail();


    return view('frontend.pages.privacyPolicy', compact('page'));
}



public function edit($id)
{
    $page = Page::findOrFail($id);
    return view('backend.admin.privacyPolicy.edit', compact('page'));
}


public function update(Request $request, $id)
    {
        $page = Page::findOrFail($id);

        $request->validate([
            'slug'    => 'required|string|max:255|unique:pages,slug,' . $page->id,
            'title'   => 'required|string|max:255',
            'content' => 'required',

        ]);

        $page->update([
            'slug'    => $request->slug,
            'title'   => $request->title,
            'content' => $request->content,

        ]);

        Alert::success('Success', 'Dynamic Pages updated successfully!')
            ->toast()
            ->position('top-end');

        return redirect()->back();
    }


    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();

        Alert::success('Success', 'Dynamic Pages updated successfully!')
            ->toast()
            ->position('top-end');

        return redirect()->back();


    }
}
