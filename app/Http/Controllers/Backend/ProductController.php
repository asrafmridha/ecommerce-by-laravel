<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Pickuppoint;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Warehouses;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        $category = Category::all();
        $brand = Brand::all();
        $warehouse = Warehouses::all();
        $pickuppoint = Pickuppoint::all();
        // $subcategory = SubCategory::where('category_id', $category->id)->get();
        return view('backend.admin.product.create', compact('product', 'category', 'brand', 'warehouse', 'pickuppoint'));
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

        $subcategory = SubCategory::where('id', $request->subcategory_id)->first();
        dd($subcategory);
        $request->validate([
            'name'          => 'required|max:55',
            'code'          => 'required|unique:products|max:55',
            'subcategory_id' => 'required',
            'brand_id'      => 'required',
            'unit'          => 'required',
            'purchase_price' => 'required',
            'selling_price' => 'required',
            'warehouse'     => 'required',
            'color'         => 'required',
            'pickup_point_id' => 'required',
            'tags'           => 'required',
            'discount_price' => 'required',
            'stock_quantity' => 'required',
            'size' => 'required',
            'short_description' => 'required',
            'thumbnails'        => 'required|image',
            'images'        => 'required|image',
        ]);

        //For get Category id
        $subcategory = SubCategory::where('id', $request->subcategory_id)->first();
        $product = new Product;
        $product->category_id = $subcategory->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->subcategory_id = $request->subcategory_id;
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
