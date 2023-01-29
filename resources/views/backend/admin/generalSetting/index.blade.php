@extends('backend.mastaring.master')

{{-- Title --}}
@section('title')
    General Settings
@endsection

{{-- Active Menu --}}
@section('generalSettings')
    active
@endsection

{{-- Page Content --}}
@section('content')

<div class="content-wrapper @yield('content-wrapper-class')">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Admin Dashboard</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Gerneral Settings
                            </li>
                        </ol>
                    </div> 
                </div>
            </div>
        </div>
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block">
            <div class="form-group breadcrumb-right">
                
            </div>
        </div>
    </div>
    <div class="content-body">
        <section>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">General Settings</h4>
                            @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            @if (session('warning'))
                                <div class="alert alert-warning">{{ session('warning') }}</div>
                            @endif
                        </div>
                        <div class="card-body">
                            <form action="{{ route('generalSettings.update', $generalSettings->id) }}" method="POST" class="form form-vertical" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                               
                                    <div class="col-12">
                                        <div class="form-group">
                                            <img src="{{ asset('uploads/generalSettings') }}/{{ generalSetting()->logo }}" alt="avatar" class="img-fluid" height="100px" width="100px">
                                        </div>
                                        <div class="form-group">
                                            <label for="logo">Logo</label>
                                            <div class="custom-file">
                                                <input type="file" name="logo" class="custom-file-input" id="logo">
                                                <label class="custom-file-label" for="logo">Choose file</label>
                                            </div>
                                            @error('logo')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <img src="{{ asset('uploads/generalSettings') }}/{{ generalSetting()->favicon }}" alt="avatar" class="img-fluid" height="100px" width="100px">
                                        </div>
                                        <div class="form-group">
                                            <label for="favicon">Favicon</label>
                                            <div class="custom-file">
                                                <input type="file" name="favicon" class="custom-file-input" id="favicon">
                                                <label class="custom-file-label" for="favicon">Choose file</label>
                                            </div>
                                            @error('favicon')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
    
    
                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="avatar avatar-xl">
                                                <img src="{{asset('uploads/generalsettings/'.generalSetting()->location_image)}}" alt="avatar">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="location_image">Location Image</label>
                                            <div class="custom-file">
                                                <input type="file" name="location_image" class="custom-file-input" id="location_image">
                                                <label class="custom-file-label" for="location_image">Choose file</label>
                                            </div>
                                            @error('location_image')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
    
                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="avatar avatar-xl">
                                                <img src="{{ asset('uploads/generalSettings') }}/{{ generalSetting()->phone_image }}" alt="avatar">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone_image">Phone Image</label>
                                            <div class="custom-file">
                                                <input type="file" name="phone_image" class="custom-file-input" id="phone_image">
                                                <label class="custom-file-label" for="phone_image">Choose file</label>
                                            </div>
                                            @error('phone_image')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
    
                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="avatar avatar-xl">
                                                <img src="{{ asset('uploads/generalSettings') }}/{{ generalSetting()->email_image }}" alt="avatar">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email_image">Email Image</label>
                                            <div class="custom-file">
                                                <input type="file" name="email_image" class="custom-file-input" id="email_image">
                                                <label class="custom-file-label" for="email_image">Choose file</label>
                                            </div>
                                            @error('email_image')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="subcategory_name">Currency</label>
                                            <select class="form-control" aria-label="Default select example" name="category_id">
                                            <option value="Taka ৳">Taka ৳</option>
                                            <option value="Dollar $">Dollar $</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="email">Compay Name</label>
                                            <input type="text" name="company_name" value="{{ generalSetting()->company_name }}" id="email" class="form-control" placeholder="Enter Company Name"/>
                                            @error('company_name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" name="address" id="address" value="{{ generalSetting()->address }}" class="form-control" placeholder="Enter address"/>
                                            @error('address')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>                              
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="email">Email address</label>
                                            <input type="email" name="email" value="{{ generalSetting()->email }}" id="email" class="form-control" placeholder="Enter email address"/>
                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
    
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="alter_email">Alternative Email address</label>
                                            <input type="email" name="alter_email" value="{{ generalSetting()->alter_email }}" id="alter_email" class="form-control" placeholder="Enter email address"/>
                                            @error('alter_email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="phone">Phone number</label>
                                            <input type="text" value="{{ generalSetting()->phone }}" name="phone" value="" id="phone" class="form-control" placeholder="Enter phone number"/>
                                            @error('phone')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
    
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="alter_phone">Alternative Phone number</label>
                                            <input type="text" name="alter_phone" value="{{ generalSetting()->alter_phone }}" id="alter_phone" class="form-control" placeholder="Enter Alternative phone number"/>
                                            @error('alter_phone')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="meta_keywords">Meta Keywords</label>
                                            <input type="text" name="meta_keywords" value="{{ generalSetting()->meta_keywords }}"  id="meta_keywords" class="form-control" placeholder="Enter meta keywords"/>
                                            @error('meta_keywords')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="meta_title">Meta Title</label>
                                            <input type="text" name="meta_title" value="{{ generalSetting()->meta_title }}" id="meta_title" class="form-control" placeholder="Enter meta title"/>
                                            @error('meta_title')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="meta_description">Meta Description</label>
                                            <input type="text" name="meta_description" value="{{ generalSetting()->meta_description }}" id="meta_description" class="form-control" placeholder="Enter meta description"/>
                                            @error('meta_description')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
    
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="copyright_text">Copyright Text</label>
                                            <input type="text" name="copyright_text" value="{{ generalSetting()->copyright_text }}" id="copyright_text" class="form-control" placeholder="Enter meta description"/>
                                            @error('copyright_text')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
    
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="footer_description">Footer Description <small class="text-danger">*</small></label>
                                            <div>
                                               <textarea name="footer_description" placeholder="Enter Short footer_descriptionn" class="form-control">{{ generalSetting()->footer_description }}"</textarea>
                                            </div>
                                        </div>
                                        @error('footer_description')
                                            <div class="alert alert-danger">
                                                <div class="alert-body">
                                                    {{ $message }}
                                                </div>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary waves-effect waves-float waves-light w-100 w-sm-auto">Submit</button>
                                    </div>
                                </div> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div> 
@endsection