@extends('backend.mastaring.master')
@section('setting','active')
@section('breadcrumb')
    <h2 class="content-header-title float-left mb-0">Admin Dashboard</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="">Dynamic Page</a>
            </li>
        </ol>
    </div>
@endsection
@section('content') 

{{-- Data Filter Start --}}
<div class="card-body">
    <div class="btn-group"> 
        <a href="{{ route('page.create') }}"  class="end btn btn-primary">Add Page</a> 
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
            <div class="col-md">
                <div class="form-group mb-md-0">
                    <div class="input-group">
                            <input required type="search" name="search" class="form-control table_search " placeholder="Search Here by Name or Designation"  value="{{old('search')}}">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <button type="submit" class="btn btn-sm" style="height: 23px"><i data-feather='search'></i></button>
                          </span>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </form>
</div>


{{-- Data Filter End  --}}
          <!-- Dark Tables start -->
<div class="row" id="white-table">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Total Pages ({{ $page->count() }})</h4>
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
                            <th>Page Name</th>
                            <th>Page Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                            <tbody>
                            @foreach ( $page as $page) 
                                <tr>
                                    <td>
                                        <div class="custom-control custom-control-primary custom-checkbox">
                                        <input type="checkbox" class="custom-control-input select_item"
                                            id="service_select_">
                                        <label class="custom-control-label text-white"
                                            for="service_select_"></label>
                                        </div>
                                    </td>
                                    <td>{{ $page->page_name }}</td>
                                    <td>{{ $page->page_title }}</td>
                                            
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-sm text-dark dropdown-toggle hide-arrow" data-toggle="dropdown">
                                                    <i data-feather="more-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <button data-target="#updateCategoryModal__{{ $page->id }}" data-toggle="modal"class="dropdown-item" href="javascript:void(0);">
                                                        <i data-feather="edit-2" class="mr-50"></i>
                                                        <span>Edit</span>
                                                                                                                                     </button>
                                                    <button data-target="#delete_category__{{ $page->id }}" data-toggle="modal" type="submit" class="dropdown-item" href="javascript:void(0);">
                                                        <i data-feather="trash" class="mr-50"></i>
                                                        <span>Delete</span>
                                                    </button>
                                                </div>
                                            </div>                  
                                        </td>
                                </tr>

                                    {{-- Modal for category  delete  --}}
                                    <div class="modal fade" id="delete_category__{{ $page->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Confirmation Message</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                                </button>
                                                </div> 
                                                <div class="modal-body text-white bg-dark">
                                                    <form action="{{ route('page.destroy',$page->id) }}" method="POST">
                                                        @method('delete')
                                                        @csrf
                                                            Are you sure want to delete this Page?
                                                    
                                                        <div class="modal-footer">
                                                                    <a type="button" class="btn btn-secondary" data-dismiss="modal">Close</a>
                                                                    <button type="submit" class="btn btn-primary deletemodalservicebutton">Confirm</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>      
                                    
                                    {{-- Modal For add  Update Category   --}}
                                    <div class="modal fade" id="updateCategoryModal__{{ $page->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('page.update',$page->id) }}" method="POST">
                                                        
                                                    @csrf

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="page_position">Page Position<small class="text-danger">*</small></label>
                                                        <select name="page_position" id="" class="form-control">
                                                            <option value="1" @if($page->page_position==1) selected  @endif>Line One</option>
                                                            <option value="1" @if($page->page_position==2) selected  @endif>Line Two</option>
                                                            
                                                        </select>

                                                        </div>
                                                        @error('page_position')
                                                            <div class="alert alert-danger">
                                                                <div class="alert-body">
                                                                    {{ $message }}
                                                                </div>
                                                            </div>
                                                        @enderror
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="page_name">Page Name<small class="text-danger">*</small></label>
                                                        <input type="text" class="form-control" id="title" value="{{ $page->page_name }}" name="page_name" placeholder="Enter Coupon Name">
                                                    </div>
                                                    @error('page_name')
                                                        <div class="alert alert-danger">
                                                            <div class="alert-body">
                                                                {{ $message }}
                                                            </div>
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="page_title">Page Title<small class="text-danger">*</small></label>
                                                        <input type="text" class="form-control" id="title" name="page_title" placeholder="Enter Page Title" value="{{ $page->page_title }}">
                                                    </div>
                                                    @error('page_title')
                                                        <div class="alert alert-danger">
                                                            <div class="alert-body">
                                                                {{ $message }}
                                                            </div>
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="short_description">{{'Enter Page Description'}} <small class="text-danger">*</small></label>
                                                        <div>                                    
                                                            <textarea name="page_description" placeholder="Underground Short Description" class="form-control">{{ $page->page_description }}</textarea>
                                                        </div>
                                                    </div>
                                                    @error('page_descriptiontion.en')
                                                        <div class="alert alert-danger">
                                                            <div class="alert-body">
                                                                {{ $message }}
                                                            </div>
                                                        </div>
                                                    @enderror
                                                </div>
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                                    </form>
                                            </div>
                                        </div>
                                    </div> 
                    @endforeach
                               
                            </tbody>
                        </table>
                                        {{-- {{ $page->links('vendor.pagination.custom') }} --}}
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

{{-- Modal For add  Add Category   --}}
<div class="modal fade" id="AddCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Page</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('category.store') }}" method="POST">
                @csrf
              

                <label for="category_name" class="mt-1"></label>Page Name</label>
                <input type="text" name="category_name" class=" form-control import" >
                    @error('category_name')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>  
                    @enderror 

                    <label for="category_name" class="mt-1"></label>Page Title</label>
                    <input type="text" name="category_name" class=" form-control import" >
                        @error('category_name')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>  
                        @enderror 

                        <div class="col-12">
                            <div class="form-group">
                                <label for="page_description">{{ __('Page Short Description') }}  <small class="text-danger">*</small></label>
                                <div>
                                    <textarea name="page_description[en]" placeholder="Enter Facilities Short Descriptionn" class="form-control"></textarea>
                                </div>
                                     
                            </div>
                                @error('page_description.en')
                                    <div class="alert alert-danger">
                                        <div class="alert-body">
                                            {{ $message }}
                                        </div>
                                    </div>
                                @enderror
                        </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
                </form>
        </div>
    </div>
</div> 


{{-- End mass delete modal --}}

@endsection




@section('js')
    <script>
        $(document).ready(function() {
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