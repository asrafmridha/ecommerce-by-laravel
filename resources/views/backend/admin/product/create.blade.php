@extends('backend.mastaring.master')

@section('content')

 <!-- BEGIN: Content-->
 <div class="row match-height">
    <!-- Medal Card -->
    <div class="col-xl-8 col-md-6 col-12">
        <h4 class="p-1 bg-primary">Add New Product</h4>
        <div class="card card-congratulation-medal">
            <div class="card-body">
            <form action="{{ route('product.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-12">
                            <label class="h5" for="name">Enter Product Name</label>
                            <input type="text" name="name" class=" form-control import">
                                    @error('name')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>  
                                    @enderror
                        </div>

                        <div class="col-12 mt-1">
                            <label class="h5" for="category_id">Enter Category/Subcategory</label>
                            <select name="subcategory_id" id="category_id" class="form-control">
                                <option disabled value="">===Select Item==</option> <br>
                                @foreach ($category as $category)
                                    @php   
                                        $subcategory = DB::table('sub_categories')->where('category_id', $category->id)->get();
                                    @endphp 
                                    <option  value="{{ $category->id }}"><span class="text-white">Category::</span>{{ $category->category_name }}</option>

                                    @foreach ($subcategory as $subcat)
                                        <option value="{{ $subcat->id }}">-----  {{ $subcat->sub_category_name }}  ------</option>
                                    @endforeach
                                @endforeach   
                            </select>
                                    @error('category_id')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>  
                                    @enderror
                        </div>

                        <div class="col-12 mt-2">
                            <label class="h5" for="brand_id">Brand</label>
                            <select name="brand_id" id="" class="form-control">
                                @foreach ($brand as $brand)
                                     <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                @endforeach
                                 
                            </select>
                                    @error('brand_id')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>  
                                    @enderror
                        </div>
                        <div class="col-12 mt-2">
                            <label class="h5" for="unit">Unit</label>
                            <input type="number" name="unit" class=" form-control import">
                                    @error('unit')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>  
                                    @enderror
                        </div>
                        <div class="row">
                            <div class="col-6 mt-2">
                                <label class="h5" for="purchase_price">Purchase Price</label>
                                <input type="text" name="purchase_price" class=" form-control import">
                                    @error('purchase_price')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>  
                                    @enderror
                            </div>
                            <div class="col-6 mt-2">
                                <label class="h5" for="selling_price">Selling Price</label>
                                <input type="text" name="selling_price" class=" form-control import">
                                    @error('selling_price')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>  
                                    @enderror
                            </div>
                            {{-- <div class="col-4 mt-2">
                                <label class="h5" for="pickup_point_address">Discount Price</label>
                                <input type="number" name="pickup_point_address" class=" form-control import">
                                    @error('pickup_point_address')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>  
                                    @enderror
                            </div> --}}
                        </div>
                        <div class="col-12 mt-2">
                            <label class="h5" for="warehouse">Warehouse</label>
                            <select name="warehouse" id="" class="form-control">
                                @foreach ($warehouse as $warehouse)
                                    <option value="{{ $warehouse->id }}">{{ $warehouse->warehouse_name }}</option>
                                @endforeach
                               
                            </select>
                                    @error('warehouse')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>  
                                    @enderror
                        </div>

                        <div class="col-8 mt-2">
                            <label class="h5" for="color">Color</label>
                            <select name="color" id="" class="form-control">
                                <option >==Select Color==</option>
                                <option value="yellow">yellow</option>
                                <option value="red">Red</option>
                            </select>
                                    @error('color')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>  
                                    @enderror
                        </div>  
                    </div>
                
                    <div class="col-md-6">
                        <div class="col-12">
                              <label class="h5" for="code">Product Code</label>
                                <input type="text" name="code" class=" form-control import">
                                    @error('code')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>  
                                    @enderror
                        </div>
                        <div class="col-12 mt-2">
                              <label class="h5" for="childcategory_id">Child Category*</label>
                                 <select name="childcategory_id" id="childcategory_id" class="form-control">
                                   
                                </select>
                                    @error('childcategory_id')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>  
                                    @enderror
                        </div>
                        <div class="col-12 mt-2">
                              <label class="h5" for="pickup_point_id">Pickup Point*</label>
                                <select name="pickup_point_id" id="" class="form-control">
                                    @foreach ($pickuppoint as $pickuppoint)
                                        <option value="{{ $pickuppoint->id }}">{{ $pickuppoint->pickup_point_name }}</option>
                                    @endforeach
                                </select>
                                    @error('pickup_point_id')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>  
                                    @enderror
                                
                        </div>
                        <div class="col-8 mt-2">
                              <label class="h5" for="tags">Tags*</label>
                                <input type="text" name="tags" class=" form-control import">
                                    @error('tags')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>  
                                    @enderror
                        </div>
                        <div class="col-12 mt-2">
                              <label class="h5" for="discount_price">Discount Price*</label>
                                <input type="text" name="discount_price" class=" form-control import">
                                    @error('discount_price')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>  
                                    @enderror
                        </div>
                        <div class="col-12 mt-2">
                              <label class="h5" for="stock_quantity">Stock*</label>
                                <input type="text" name="stock_quantity" class=" form-control import">
                                    @error('stock_quantity')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>  
                                    @enderror
                        </div>
                         <div class="col-8 mt-2">
                              <label class="h5" for="size">Size*</label>
                                <input  type="text" name="size" class=" form-control import">
                                    @error('size')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>  
                                    @enderror
                        </div>
                    </div>
                    <div class="col-12 mt-2">
                        <div class="form-group">
                            <label for="short_description"> {{ __('Short Description') }} <span class="text-danger">*</span> </label>
                            <textarea name="description" id="short_description" class="form-control" cols="5" rows="5" placeholder="Write short description..">{{ old('short_description') }}</textarea>
                                    @error('short_description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    
                            
                        </div>
                    </div>
                </div>
            
            </div>   
        </div>  
    </div>
    <!--/ Medal Card -->

    <!-- Statistics Card -->
    <div class="col-xl-4 col-md-6 col-12">
        <h4 class="p-1 bg-success">More Thumbnails</h4>
        <div class="card card-statistics ">
        
            <div class="card-body statistics-body">
               
                  <div class="col-12">
                        <div class="form-group">
                            <label for="single_product_image">Main Image <small class="text-danger">*(Image recommended size 370 X 240 px) </small></label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="single_product_image" name="thumbnails">
                                        <label class="custom-file-label" for="single_product_image">Choose Image</label>
                                </div>
                                @error('room_photo')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                    </div> <br> <br>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="single_product_image">More Image <small class="text-danger">*(Image recommended size 370 X 240 px) </small></label>
                                <div class="custom-file">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <input type="file" class="custom-file-input" id="more-image" name="images[]">
                                            <label class="custom-file-label" 
                                        for="single_product_image">Choose Image</label>
                                        </div>
                                        
                                        <div class="col-md-1"><a id="more-images" class="btn btn-primary btn-sm">Add</a></div>  

                                        <table class="table-bordered" id="dynamic_field"></table>
                                    </div>
                                </div>
                                @error('room_photo')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                        </div>
                    </div>
                
            <div class="row">
                    <div class="col-md-4">
                        <label for="featured">Featured</label>
                        <label class="switch">
                    
                            <input type="checkbox" name="featured" checked>
                            <span class="slider round"></span>
                        </label>
                    </div>

                <div class="col-md-4">
                    <label for="featured">Today Deal</label>
                    <label class="switch">
                    
                        <input type="checkbox" name="today_deal" checked>
                        <span class="slider round"></span>
                    </label>
                </div>

                <div class="col-md-4">
                    <label for="featured">Status</label>
                    <label class="switch">
                    
                        <input type="checkbox" name="status" checked>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>


                
                
                
                </div>
                
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-lg btn-block mb-2">Save</button> 
    </form>
    <!--/ Statistics Card -->
    {{-- <tr id="row'+i+'" class="dynamic-added"><td><input type="file" accept="image/*" name="images[]" class="form-control"></td> <button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></tr> --}}
</div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
           $('#category_id').change(function (e) { 
                e.preventDefault();
                var subcategory_id=$(this).val();
                $.ajax({
                    type: "GET",
                    url: "{{ route('childcategory-join') }}"+'/'+subcategory_id,
                    dataType: "JSON",
                    success: function (response) {
                        $.each(response.data, function (key, data) { 
                             $('#childcategory_id').append('<option value="'+data.id+'">'+data.childcategory_name+'</option>');
                             
                        });    
                    }
                });
                
            });
           
            var postUrl= "<?php echo url('add more') ?>";
            var i=1;
            $('#more-images').on('click',function(){

                i++;
                $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added " ><td><input type="file" accept="image/*" name="images[]" class="form-control "></td> <button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
            });
        });
    </script>
 @endsection

         <style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
    

