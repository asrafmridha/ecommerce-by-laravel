<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use File;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand = Brand::all();
        return view('backend.admin.brand.index', compact('brand'));
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
        $request->validate([
            'brand_name' => 'required',
            'brand_logo' => 'required|image',
        ]);


        $brand = new Brand();

        $image = $request->brand_logo;
        // $image = $request->file('brand_logo');
        $filename = time() . '.' . $image->extension();
        $location = public_path('uploads/brand/');
        $image->move($location, $filename);
        // Image::make($image)->resize(240, 120)->save($location);


        $brand->brand_name = $request->brand_name;
        $brand->brand_slug = Str::slug($request->brand_name, '-');
        $brand->brand_logo = $filename;
        $brand->save();
        return back()->withSuccess('Brand Added Successfully');
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
        $request->validate([
            'brand_name' => 'required',
            // 'brand_logo' => 'image',
        ]);


        $brand = Brand::find($id);
        $image = $request->brand_logo;

        if ($image = $request->brand_logo) {
            // $image = $request->file('brand_logo');
            $filename = time() . '.' . $image->extension();
            $location = public_path('uploads/brand/');
            $image->move($location, $filename);
            // Image::make($image)->resize(240, 120)->save($location);
            $brand->brand_logo = $filename;
        }
        $brand->brand_name = $request->brand_name;
        // $brand->brand_slug = Str::slug($request->brand_name, '-');

        $brand->update();
        return back()->withSuccess('Brand Added Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Brand::find($id)->delete();
        return back()->withSuccess('Delete Brand Successfully');
    }
}
