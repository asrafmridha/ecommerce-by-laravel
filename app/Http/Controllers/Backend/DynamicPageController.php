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
        $request->validate([
            'page_position'    => 'required',
            'page_name'        => 'required',
            'page_title'       => 'required',
            'page_description' => 'required',

        ]);

        $page = new DynamicPage();
        $page->page_position = $request->page_position;
        $page->page_name = $request->page_name;
        $page->page_title = $request->page_title;
        $page->page_description = $request->page_description;
        $page->page_slug = Str::slug($request->page_name, '-');
        $page->save();
        return back()->withSuccess('Page Create Successfully');
    }

    public function destroy($id)
    {
        DynamicPage::find($id)->delete();
        return back()->withSuccess("Delete Page Successfully");
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'page_position'    => 'required',
            'page_name'        => 'required',
            'page_title'       => 'required',
            'page_description' => 'required',

        ]);
        DynamicPage::find($id)->update($request->except('_token'));
        return back()->withSuccess("Update Page Successfully");
    }
}
