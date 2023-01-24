<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Imports\CategoryImport;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class CategoryController extends Controller
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
        $category = Category::paginate(5);
        return view('backend.admin.category.category', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            'category_name' => 'required',
        ]);
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->category_slug = Str::slug($request->category_name, '-');
        $category->save();
        return back()->withSuccess('Data Saved Successfuuly');
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
        Category::find($id)->update($request->except('_token'));
        return back()->withSuccess('Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        // Query Builder 
        // DB::table('categories')->where('id', $id)->delete();

        //eloquent 
        Category::find($id)->delete();
        return back()->withSuccess('Category Delete Successfully');
    }

    public function CategoryMassDelete(Request $request)
    {
        $category = Category::findMany($request->ids);
        $category->each->delete();
        return response()->json(['success' => 'Successfully Delete']);
    }

    // public function category_export(Request $request)
    // {

    //     $explode = explode(',', $request->id);

    //     $ids = [];
    //     $header = [];
    //     $header[] = 'id';
    //     $header[] = 'name';
    //     $header[] = 'email';
    //     $header[] = 'gender';
    //     $header[] = 'department';
    //     $header[] = 'designation';
    //     $header[] = 'birth_day';
    //     $header[] = 'blood_group';
    //     $header[] = 'address';
    //     $header[] = 'phone';
    //     // $header [] = 'created_by';
    //     // $header [] = 'updated_by';
    //     $header[] = 'created_at';
    //     $header[] = 'updated_at';
    //     foreach ($explode as $id) {
    //         array_push($ids, $id);
    //     }
    //     return Excel::download(new TeacherExport($ids, $header), 'Teacher.xlsx');
    // }

    public function category_import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        Excel::import(new CategoryImport(), $request->file('file'));

        return back()->withSuccess('Category Imported');
    }

    public function categoryDateFilter()
    {
        request()->validate([
            'start_date' => 'required',
            'end_date'  => 'required',
        ]);
        $category = Category::whereBetween('created_at', [request()->start_date, request()->end_date])->paginate(10);
        return view('backend.admin.category.category', compact('category'));
    }
}
