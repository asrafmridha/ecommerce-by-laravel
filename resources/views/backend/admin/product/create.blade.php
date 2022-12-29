@extends('backend.mastaring.master')

@section('content')

 <!-- BEGIN: Content-->
 <div class="row match-height">
    <!-- Medal Card -->
    <div class="col-xl-8 col-md-6 col-12">
        <h4 class="p-1 bg-primary">Add New Product</h4>
        <div class="card card-congratulation-medal">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-12">
                            <label class="h5" for="pickup_point_address">Enter Product Name</label>
                            <input type="text" name="pickup_point_address" class=" form-control import">
                                    @error('pickup_point_address')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>  
                                    @enderror
                        </div>

                        <div class="col-12 mt-1">
                            <label class="h5" for="pickup_point_address">Enter Category/Subcategory</label>
                            <select name="" id="" class="form-control">
                                <option disabled value="">===Select Item==</option> <br>
                                @foreach ($category as $category)
                                    @php   
                                        $subcategory = DB::table('sub_categories')->where('category_id', $category->id)->get();
                                    @endphp 
                                    <option disabled value=""><span class="text-white">Category::</span>{{ $category->category_name }}</option>

                                    @foreach ($subcategory as $subcat)
                                        <option value="{{ $subcat->id }}">-----  {{ $subcat->sub_category_name }}  ------</option>
                                    @endforeach
                                @endforeach
                                
                                
                            </select>
                                    @error('pickup_point_address')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>  
                                    @enderror
                        </div>

                        <div class="col-12 mt-2">
                            <label class="h5" for="pickup_point_address">Brand</label>
                            <select name="" id="" class="form-control">
                                <option value="">gfd</option>
                                <option value="">dgfdfg</option>
                            </select>
                                    @error('pickup_point_address')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>  
                                    @enderror
                        </div>
                        <div class="col-12 mt-2">
                            <label class="h5" for="pickup_point_address">Unit</label>
                            <input type="number" name="pickup_point_address" class=" form-control import">
                                    @error('pickup_point_address')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>  
                                    @enderror
                        </div>
                        <div class="row">
                            <div class="col-6 mt-2">
                                <label class="h5" for="pickup_point_address">Purchase Price</label>
                                <input type="text" name="pickup_point_address" class=" form-control import">
                                    @error('pickup_point_address')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>  
                                    @enderror
                            </div>
                            <div class="col-6 mt-2">
                                <label class="h5" for="pickup_point_address">Selling Price</label>
                                <input type="text" name="pickup_point_address" class=" form-control import">
                                    @error('pickup_point_address')
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
                            <label class="h5" for="pickup_point_address">Warehouse</label>
                            <select name="" id="" class="form-control">
                                <option value="">gfd</option>
                                <option value="">dgfdfg</option>
                            </select>
                                    @error('pickup_point_address')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>  
                                    @enderror
                        </div>

                        <div class="col-8 mt-2">
                            <label class="h5" for="pickup_point_address">Color</label>
                            <select name="" id="" class="form-control">
                                <option value="">gfd</option>
                                <option value="">dgfdfg</option>
                            </select>
                                    @error('pickup_point_address')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>  
                                    @enderror
                        </div>

                        
                        
                    </div>
                  

                    <div class="col-md-6">
                        <div class="col-12">
                              <label class="h5" for="pickup_point_address">Product Code</label>
                                <input type="text" name="pickup_point_address" class=" form-control import">
                                    @error('pickup_point_address')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>  
                                    @enderror
                        </div>
                        <div class="col-12 mt-2">
                              <label class="h5" for="pickup_point_address">Child Category*</label>
                                <input type="text" name="pickup_point_address" class=" form-control import">
                                    @error('pickup_point_address')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>  
                                    @enderror
                        </div>
                        <div class="col-12 mt-2">
                              <label class="h5" for="pickup_point_address">Pickup Point*</label>
                                <input type="text" name="pickup_point_address" class=" form-control import">
                                    @error('pickup_point_address')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>  
                                    @enderror
                        </div>
                        <div class="col-8 mt-2">
                              <label class="h5" for="pickup_point_address">Tags*</label>
                                <input type="text" name="pickup_point_address" class=" form-control import">
                                    @error('pickup_point_address')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>  
                                    @enderror
                        </div>
                        <div class="col-12 mt-2">
                              <label class="h5" for="pickup_point_address">Discount Price*</label>
                                <input type="text" name="pickup_point_address" class=" form-control import">
                                    @error('pickup_point_address')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>  
                                    @enderror
                        </div>
                        <div class="col-12 mt-2">
                              <label class="h5" for="pickup_point_address">Stock*</label>
                                <input type="text" name="pickup_point_address" class=" form-control import">
                                    @error('pickup_point_address')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>  
                                    @enderror
                        </div>
                         <div class="col-8 mt-2">
                              <label class="h5" for="pickup_point_address">Size*</label>
                                <input type="text" name="pickup_point_address" class=" form-control import">
                                    @error('pickup_point_address')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>  
                                    @enderror
                        </div>
                    </div>
                    <div class="col-12 mt-2">
                        <div class="form-group">
                            <label for="short_description"> {{ __('Short Description') }} <span class="text-danger">*</span> </label>
                            <textarea name="short_description" id="short_description" class="form-control" cols="5" rows="5" placeholder="Write short description..">{{ old('short_description') }}</textarea>
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
                                    <input type="file" class="custom-file-input" id="single_product_image" name="room_photo">
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
                                    <input type="file" class="custom-file-input" id="single_product_image" name="room_photo">
                                        <label class="custom-file-label" for="single_product_image">Choose Image</label>
                                </div>
                                @error('room_photo')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                        </div>
                    </div>
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="customSwitches">
                    <label class="custom-control-label" for="customSwitches">Toggle this switch element</label>
                </div>
                
                </div>
            </div>
        </div>
    </div>
    <!--/ Statistics Card -->
</div>



@endsection
    

