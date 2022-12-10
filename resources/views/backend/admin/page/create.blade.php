@extends('backend.mastaring.master')
@section('setting','active')

{{-- Active Menu --}}
@section('service.index')
    active
@endsection

@push('css')

@endpush


{{-- Breadcrumb --}}
@section('breadcrumb')
    <h2 class="content-header-title float-left mb-0">Admin Dashboard</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="">Page</a>
            </li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
    </div>
@endsection

{{-- Main Content --}}
@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{ route('page.store') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create Dynamic Page</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">                           
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="page_position">Page Position<small class="text-danger">*</small></label>
                                    <select name="page_position" id="" class="form-control">
                                        <option value="1">Line One</option>
                                        <option value="1">Line Two</option>
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
                                    <input type="text" class="form-control" id="title" name="page_name" placeholder="Enter Coupon Name">
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
                                    <input type="text" class="form-control" id="title" name="page_title" placeholder="Enter Page Title">
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
                                        <textarea name="page_description" placeholder="Underground Short Description" class="form-control"></textarea>
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
                            
                            <div class="col-12">
                                <button type="submit" class="btn btn-success waves-effect waves-float waves-light w-100 w-sm-auto">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection