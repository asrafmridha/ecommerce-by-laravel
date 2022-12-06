<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Contracts\DataTable;
use Illuminate\Support\Str;

class ChildCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $childcategory = ChildCategory::all();

        $category = Category::all();

        $subcategory = SubCategory::all();

        // $subcat = DB::table('sub_categories ')->where('category_id', $category->id);
        // dd($subcat);
        return view('backend.admin.category.childcategory', compact('childcategory', 'category', 'subcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $childcategory = new ChildCategory();

        // $catId = SubCategory::where('id', $request->subcategory_id)->first();
        $catId = DB::table('sub_categories')->where('id', $request->subcategory_id)->first();

        $childcategory->category_id = $catId->category_id;
        $childcategory->subcategory_id = $request->subcategory_id;
        $childcategory->childcategory_name = $request->child_category_name;
        $childcategory->childcategory_slug = Str::slug($request->child_category_name, '-');

        $childcategory->save();

        return back()->withSuccess('ChildCategory Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
