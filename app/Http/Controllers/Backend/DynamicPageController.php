<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\DynamicPage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DynamicPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $page = DynamicPage::all();
        return view('backend.admin.page.index', compact('page'));
    }

    public function create()
    {
        return view('backend.admin.page.create');
    }


    public function store(Request $request)
    {
        $page = new DynamicPage();
        $page->page_position = $request->page_position;
        $page->page_name = $request->page_name;
        $page->page_title = $request->page_title;
        $page->page_description = $request->page_description;
        $page->page_slug = Str::slug($request->page_name, '-');
        $page->save();
        return back()->withSuccess('Page Create Successfully');
    }
}
