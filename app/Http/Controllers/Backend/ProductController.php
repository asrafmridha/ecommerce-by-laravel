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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

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
        return view('backend.admin.product.index', compact('product', 'category', 'brand', 'warehouse', 'pickuppoint'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::all();
        $category = Category::all();
        $brand = Brand::all();
        $warehouse = Warehouses::all();
        $pickuppoint = Pickuppoint::all();
        return view('backend.admin.product.create', compact('product', 'category', 'brand', 'warehouse', 'pickuppoint'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $subcategory = SubCategory::where('id', $request->subcategory_id)->first();

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
            'size'           => 'required',
            'short_description' => 'required',
            // 'thumbnails'        => 'required|image',
            // 'images'            => 'required|image',
        ]);

        //For get Category id
        $subcategory = SubCategory::where('id', $request->subcategory_id)->first();

        $product = new Product();
        $product->name             = $request->name;
        $product->slug             = Str::slug($request->name, '-');
        $product->category_id      = $subcategory->category_id;
        $product->subcategory_id   = $request->subcategory_id;
        $product->childcategory_id = $request->childcategory_id;
        $product->code             = $request->code;
        $product->brand_id         = $request->brand_id;
        $product->pickup_point_id  = $request->pickup_point_id;
        $product->unit             = $request->unit;
        $product->tags             = $request->tags;
        $product->purchase_price   = $request->purchase_price;
        $product->selling_price    = $request->selling_price;
        $product->discount_price   = $request->discount_price;
        $product->warehouse        = $request->warehouse;
        $product->discount_price   = $request->discount_price;
        $product->stock_quantity   = $request->stock_quantity;
        $product->color            = $request->color;
        $product->size             = $request->size;
        $product->description      = $request->short_description;
        $product->video            = $request->video;

        $product->featured = $request->featured ?? 'off';
        $product->today_deal = $request->today_deal ?? 'off';
        $product->status = $request->status ?? 'off';
        // $product->admin_id = Auth::id();
        // $product->date = date('d-m-Y');

        //Single Image
        if ($image = $request->thumbnails) {
            $filename = time() . '.' . $image->extension();
            $location = public_path('uploads/product/');
            $image->move($location, $filename);
            $product->thumbnails = $filename;
        }

        // Multiple Image
        $images = array();
        if ($image = $request->hasFile('images')) {

            foreach ($request->images as $key => $image) {

                $filename = time() . '.' . $image->extension();
                $location = public_path('uploads/product/');
                $image->move($location, $filename);
                array_push($images, $filename);
            }
            $product->images = json_encode($images);
        }

        $product->save();
        return back()->withSuccess('Product Save Successfully');
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
        $product = Product::find($id);
        $category = Category::all();
        $brand = Brand::all();
        $warehouse = Warehouses::all();
        $pickuppoint = Pickuppoint::all();
        return view('backend.admin.product.edit', compact('product', 'category', 'brand', 'warehouse', 'pickuppoint'));
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
        Product::find($id)->delete();
        return back()->withSuccess('Product Delete Successfully');
    }

    public function product_category_search($id)
    {
        $category_id = Category::where('id', $id)->first();
        $category_name = $category_id->category_name;
        $product = Product::all();
        $category = Category::all();
        $brand = Brand::all();
        $warehouse = Warehouses::all();
        $pickuppoint = Pickuppoint::all();

        $category = Category::where('category_name', $category_name)->get();

        $view = View('backend.admin.product.index', compact('category', 'brand', 'warehouse', 'pickuppoint', 'product'))->render();

        return response()->json([

            'view' => $view

        ]);
    }
}
