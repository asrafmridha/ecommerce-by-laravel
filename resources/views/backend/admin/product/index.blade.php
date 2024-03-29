@extends('backend.mastaring.master')
@section('product','active')
@section('breadcrumb')
    <h2 class="content-header-title float-left mb-0">Admin Dashboard</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="">Product Table </a>
            </li>
        </ol>
    </div>
@endsection
@section('content') 

{{-- Data Filter Start --}}
<div class="card-body">
    <div class="btn-group"> 
        <button data-toggle="modal" data-target="#AddsubcategoryModal" class="end btn btn-primary">Add Brand</button>  
        <a data-toggle="modal" data-target="#feedbackcsvModal" class="end btn btn-success"
            href="">Import</a>
            
        <button id="all_action"
            class="d-none btn btn-danger dropdown-toggle waves-effect waves-float waves-light"
            type="button" id="dropdownMenuButton4" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            All Action
        </button>
        <div  class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
            <button data-toggle="modal" data-target="#mass_delete_modal"  class="dropdown-item">Mass Delete</button>

            <form action="">
                <input type="hidden" name="id" id="export_id">
                <button type="submit" class=" dropdown-item">Mass Export</button>
            </form>
        </div>
    </div>
    <form action="" method="GET">
        <div class="row align-items-end">
            <div class="col-md">
                <div class="form-group">
                    <label for="start_date">Start Date <span class="text-danger">*</span></label>
                    <input type="date" name="start_date" @isset(request()->start_date) value="{{ \Carbon\Carbon::parse(request()->start_date)->format('Y-m-d') }}" @endisset id="start_date" class="form-control flatpickr-human-friendly" placeholder="dd/mm/yyyy">
                </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <label for="start_date">End Date <span class="text-danger">*</span></label>
                    <input type="date" @isset(request()->start_date) value="{{ \Carbon\Carbon::parse(request()->end_date)->format('Y-m-d') }}" @endisset name="end_date" id="end_date" class="form-control flatpickr-human-friendly" placeholder="dd/mm/yyyy">
                </div>
            </div>
             <div class="col-md-auto">
                <div class="form-group">
                    <button type="submit" class="btn btn-success waves-effect w-100 w-sm-auto">Filter</button>
                </div>
            </div>
        </div>
         <div class="row align-items-md-center">
            <div class="col-md-3 form-group">
                <label class="h5" for="brand_id">Category</label>
                    <select name="brand_id" id="category_id" class="form-control">
                            @foreach ($category as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach       
                    </select>
            </div>
             <div class="col-md-3 form-group">
                <label class="h5" for="brand_id">Brand</label>
                    <select name="brand_id" id="brand_id" class="form-control">
                            @foreach ($brand as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                            @endforeach       
                    </select>
            </div>

            <div class="col-md-3 form-group">
                <label class="h5" for="brand_id">Warehouse</label>
                    <select name="brand_id" id="warehouse_id" class="form-control">
                            @foreach ($warehouse as $warehouse)
                                <option value="{{ $warehouse->id }}">{{ $warehouse->warehouse_name }}</option>
                            @endforeach       
                    </select>
            </div>
            {{-- <div class="col-md-3 form-group">
                <label class="h5" for="brand_id">Status</label>
                    <select name="brand_id" id="" class="form-control">
                            @foreach ($warehouse as $warehouse)
                                <option value="">{{ $warehouse->warehouse_name }}</option>
                            @endforeach       
                    </select>
            </div> --}}
        </div> 
    </form>
</div>


{{-- Data Filter End  --}}
    <!-- Dark Tables start -->
<div class="row" id="white-table">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Total {{ ucfirst("product") }} ({{ $product->count() }})</h4>
            </div>  
            <div class="table-responsive " >
                <table class="table table-white " >
                    <thead>
                            {{-- @if($data->isEmpty()) --}}
                            {{-- <th><h2 class="alert alert-danger">Data Not Found</h2></th> --}}
                            {{-- @else --}}
                        <tr>
                            <th>
                                <div class="custom-control custom-control-primary custom-checkbox">
                                    <input type="checkbox" class="custom-control-input select_all"
                                            id="colorCheck1">
                                    <label class="custom-control-label text-white"
                                            for="colorCheck1"></label>
                                </div> 
                            </th>
                            <th>Thumbnails</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Category</th>
                            <th>Subcategory</th>
                            <th>Brand</th>
                            <th>Featured</th>
                            <th>Today Deal</th>
                            <th>Status</th>
                             <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                  @foreach ($product as $product) 
                                <tr>
                                    
                                    <td>
                                        <div class="custom-control custom-control-primary custom-checkbox">
                                        <input type="checkbox" class="custom-control-input select_item"
                                            id="service_select_">
                                        <label class="custom-control-label text-white"
                                            for="service_select_"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <img src="{{ asset('uploads/product/'.$product->thumbnails) }}" height="90px" width="100px" alt="thumbalainls">
                                    </td>
                                    @php
                                        $category=DB::table('categories')->where('id',$product->category_id)->first();
                                        $subcategorie=DB::table('sub_categories')->where('id',$product->subcategory_id)->first();
                                        $brand= DB::table('brands')->where('id',$product->brand_id)->first();
                                    @endphp


                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->code }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{{ $subcategorie->sub_category_name }}</td>
                                    <td>{{ $brand->brand_name }}</td>

                                @if ($product->featured=="on")
                                    <td><a href="{{ route('featured.status',$product->id) }}" class="btn btn-primary">{{ $product->featured }}</a></td>
                                @else
                                    <td><a href="{{ route('featured.status',$product->id) }}" class="btn btn-danger">{{ $product->featured }}</a></td>
                                @endif    
                                
                                @if ($product->today_deal=='on')
                                    <td><a href="{{ route('deal.status',$product->id) }}" class="btn btn-primary">{{ $product->today_deal }}</a></td>
                                @else
                                    <td><a href="{{ route('deal.status',$product->id) }}" class="btn btn-danger">{{ $product->today_deal }}</a></td>
                                @endif 

                                @if ($product->status=='on')
                                    <td><a href="{{ route('status.update',$product->id) }}" class="btn btn-primary">{{ $product->status }}</a></td>
                                @else
                                    <td><a href="{{ route('status.update',$product->id) }}" class="btn btn-danger">{{ $product->status }}</a></td>
                                @endif
                                     {{-- <td><img height="120px" width="150px" src="{{ asset('uploads/brand/'.$brand->brand_logo) }}" alt=""></td> --}}
                                            
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-sm text-dark dropdown-toggle hide-arrow" data-toggle="dropdown">
                                                    <i data-feather="more-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{ route('product.edit',$product->id) }}">
                                                            <i data-feather="edit-2" class="mr-50"></i>
                                                            <span>Edit</span>
                                                                                                                                        </a>
                                                    <button data-target="#delete_subcategory__{{ $product->id }}" data-toggle="modal" type="submit" class=" dropdown-item" href="javascript:void(0);">
                                                        <i data-feather="trash" class="mr-50"></i>
                                                        <span>Delete</span>
                                                    </button>
                                                </div>
                                            </div>                  
                                        </td>
                                </tr>

                                    {{-- Modal for subcategory  delete  --}}
                                    <div class="modal fade" id="delete_subcategory__{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Confirmation Message</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                                </button>
                                                </div> 
                                                <div class="modal-body text-white bg-dark">
                                                    <form action="{{ route('product.destroy',$product->id) }}" method="POST">
                                                        @method('delete')
                                                        @csrf
                                                            Are you sure want to delete this Product?
                                                    
                                                        <div class="modal-footer">
                                                                    <a type="button" class="btn btn-secondary" data-dismiss="modal">Close</a>
                                                                    <button type="submit" class="btn btn-primary deletemodalservicebutton">Confirm</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>      
                                    
                                    {{-- Modal For   Update subcategory   --}}
                                    <div class="modal fade" id="updatebrandModal__{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Brand</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('brand.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                                                        @method('PUT')
                                                    @csrf

                                                     <label for="brand_name">Enter  Update Brand Name</label>
                                                    <input type="text" name="brand_name" class="mt-1 form-control import" value="{{ $product->brand_name }}" >
                                                        @error('brand_name')
                                                        <div class="alert alert-danger">
                                                            {{$message}}
                                                        </div>  
                                                        @enderror 

                                                        <label for="brand_logo">Old Image</label> <br>

                                                        <img class="mt-1" height="150px" width="150px" src="{{ asset('uploads/brand/'.$product->brand_logo) }}" alt=""> <br> <br>

                                                        <label for="brand_logo">Brand Logo</label>

                                                        <input type="file" name="brand_logo" class="form-control import" >
                                                        @error('brand_logo')
                                                        <div class="alert alert-danger">
                                                            {{$message}}
                                                        </div>  
                                                        @enderror
                                                  
                                                       
 
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                                    </form>
                                            </div>
                                        </div>
                                    </div> 
                                    
                    @endforeach
                               
                        </tbody>
                </table>
                        {{-- {{ $brand->links() }} --}}

                        {{-- {{ $brand->links() }} --}}
                        
                        {{-- {{ $brand->links('vendor.pagination.custom') }} --}}
                                        
            </div>
        </div>
    </div>
</div>
<!-- Dark Tables end -->

{{-- modal for mass delete  --}}

<div class="modal fade text-left" id="mass_delete_modal" tabindex="-1" aria-labelledby="myModalLabel33"
 style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="p-3 text-center">
                <h1 class="text-danger">Are your sure?</h1>
                <p>You want to delete this</p>
            </div>
            <a id="mass_delete" class="btn btn-danger">DELETE</a>
        
        </div>
    </div>
</div> 


{{-- End mass delete modal --}}

{{-- Modal For   Add subcategory   --}}
<div class="modal fade" id="AddsubcategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New ChildCategory</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="subcategory_name">Brand Name</label>
                    <input type="text" name="brand_name" class="form-control import" >
                    @error('sub_category_name')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>  
                    @enderror
                   

                    <label for="brand_logo">Brand Logo</label>
                    <input type="file" name="brand_logo" class="form-control import" >
                    @error('brand_logo')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>  
                    @enderror 
            </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
        </div>
    </div>
</div> 

@endsection


@section('js')
    <script>
        $(document).ready(function() {

            $('#category_id').on('change',function(){
            var category_id=$(this).val();
            $.ajax({
                type: "POST",
                url: "{{ route('product-category-seach') }}"+'/'+category_id,
                dataType: "dataType",
                success: function (response) {
                    
                }
            });
             


            });






















            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            //select all feature
            $('.select_all').change(function() {
                ids = []
                if ($(this).is(":checked")) {
                    $('.select_item').prop('checked', true);
                    $('.select_item').each(function() {
                        ids.push($(this).attr('id').split('_')[2]);
                    });
                    if (ids.length == 0) {
                        $('#all_action').addClass('d-none');
                    } else {
                        $('#all_action').removeClass('d-none');
                        $('#export_id').val(ids);
                    }
                } else {
                    $('.select_item').prop('checked', false);
                    $('#all_action').addClass('d-none');
                }
                $(document).on('click', '#mass_delete', function(){
                $('#mass_delete').click(function() {
                    $.ajax({
                        type: 'get',
                        url: "{{ route('category.bulkDelete') }}",
                        data: {
                            'ids': ids
                        },
                        success: function(response) {
                            if (response.success) {
                                toastr.success(response.success);
                                $('#all_action').addClass('d-none');
                                window.location.reload();
                            }
                        }
                    })
                });
            });
            //individual select feature
            $('.select_item').change(function() {
                ids = []
                $('.select_item').each(function() {
                    if ($(this).is(":checked")) {
                        ids.push($(this).attr('id').split('_')[2]);
                    }
                });
                if (ids.length == 0) {
                    $('#all_action').addClass('d-none');
                    $('.select_all').prop('checked', false);
                } else {
                    $('#all_action').removeClass('d-none');
                    $('#export_id').val(ids);
                }
                $(document).on('click', '#mass_delete', function(e) {
                    $.ajax({
                        type: 'get',
                        url: "{{ route('category.bulkDelete') }}",
                        data: {
                            'ids': ids
                        },
                        success: function(response) {
                            if (response.success) {
                                toastr.success(response.success);
                                $('#all_action').addClass('d-none');
                                window.location.reload();
                            }
                        }
                    })
                });
            });
            // seach
            $('#search').keyup(function() {
                var value = $(this).val().toLowerCase();
                $('#service_table tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
            //service search
            $('#search').keyup(function(){
                var value = $(this).val();
                $.ajax({
                    type:'get',
                    url:"",
                    data:{'value':value},  
                    success:function(response){                  
                            $('#data_table').html(response);
                    }
                });
            });
        });
    });
    </script>
@endsection

