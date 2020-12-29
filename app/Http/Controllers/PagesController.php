<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Category;
use App\Models\Parse;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
       return view('admin.pages.index', [
            'pages' => Page::get()
        ]);
    }

    public function create()
    {
        return view('admin.pages.create', [
            'page' => [],
            'categories' => Category::with('children')->where('parent_id', 0)->get(),
            'delimiter' => ''
        ]);
    }

    public function store(Request $request)
    {
        $page = Page::create($request->except(['categories']));

        if($request->has('categories')) :
            $page->categories()->attach($request->input('categories'));
        endif;


        return redirect()->route('admin.pages.index');
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit', [
            'page' => $page,
            'categories' => Category::with('children')->where('parent_id', 0)->get(),
            'delimiter' => ''
        ]);
    }
    public function show(Request $request)
    {
        $url = $request->path();
        $page = Page::where('path', $url)->first();
        $pages = Page::orderBy('created_at', 'desc')->get();        
        if ($page->alias_of ?? "" != NULL){
            $newpage=Page::find($page->alias_of);
            $page->title = $newpage->title;
            $page->main_content = $newpage->main_content;
            $page->director = $newpage->director;
            $page->created_at = $newpage->created_at;
            $page->updated_at = $newpage->updated_at;            
        }         
        if ($page) {
          return view('home', ['page' => $page, 'pages' => $pages]);
        }
        return view('sorry', ['pages' => $pages]);
    }

    public function update(Request $request, Page $page)
    {

        $page->update($request->except('categories'));
        $page->categories()->detach();
        if($request->has('categories')) :
            $page->categories()->attach($request->input('categories'));
        endif;


        return redirect()->route('admin.pages.index');
    }

    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('admin.pages.index');
    }
}
