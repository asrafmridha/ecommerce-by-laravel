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
                <a href="">Seo Update </a>
            </li>
        </ol>
    </div>
@endsection
@section('content') 

{{-- Main Content --}}
@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{ route('seo.update',$seo->id) }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update Seo</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">                           
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Meta Title<small class="text-danger">*</small></label>
                                    <input type="text" class="form-control" id="title" name="meta_title" placeholder="Enter  Meta Title" value="{{ $seo->meta_title }}">
                                </div>
                                @error('meta_title')
                                    <div class="alert alert-danger">
                                        <div class="alert-body">
                                            {{ $message }}
                                        </div>
                                    </div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Meta Author<small class="text-danger">*</small></label>
                                    <input type="text" class="form-control" id="title" name="meta_author" placeholder="Enter  Meta Author" value="{{ $seo->meta_author }}">
                                </div>
                                @error('meta_author')
                                    <div class="alert alert-danger">
                                        <div class="alert-body">
                                            {{ $message }}
                                        </div>
                                    </div>
                                @enderror
                            </div>


                            <div class="col-12">
                                <div class="form-group">
                                    <label for="meta_tag">Meta Tag<small class="text-danger">*</small></label>
                                    <input type="text"class="form-control" id="title" name="meta_tag" placeholder="Enter  Meta Tag" value="{{ $seo->meta_tag }}">
                                </div>
                                @error('meta_tag')
                                    <div class="alert alert-danger">
                                        <div class="alert-body">
                                            {{ $message }}
                                        </div>
                                    </div>
                                @enderror
                            </div>

                              <div class="col-12">
                                <div class="form-group">
                                    <label for="meta_keyword">Meta Keywords<small class="text-danger">*</small></label>
                                    <input type="text"class="form-control" id="title" name="meta_keyword" placeholder="Enter  Meta Keywords" value="{{ $seo->meta_keyword }}">
                                </div>
                                @error('meta_keyword')
                                    <div class="alert alert-danger">
                                        <div class="alert-body">
                                            {{ $message }}
                                        </div>
                                    </div>
                                @enderror
                            </div> 

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="meta_keyword">Google Verification<small class="text-danger">*</small></label>
                                    <input type="text"class="form-control" id="title" name="google_verification" placeholder="Enter  Google Verification" value="{{ $seo->google_verification }}">
                                </div>
                                @error('google_verification')
                                    <div class="alert alert-danger">
                                        <div class="alert-body">
                                            {{ $message }}
                                        </div>
                                    </div>
                                @enderror
                            </div> 

                             <div class="col-12">
                                <div class="form-group">
                                    <label for="alexa_verification">Alexa Verification<small class="text-danger">*</small></label>
                                    <input type="text"class="form-control" id="title" name="alexa_verification" placeholder="Enter  Alexa Verification" value="{{ $seo->alexa_verification }}">
                                </div>
                                @error('alexa_verification')
                                    <div class="alert alert-danger">
                                        <div class="alert-body">
                                            {{ $message }}
                                        </div>
                                    </div>
                                @enderror
                            </div> 

                            

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="google_analytics">Google Analytics<small class="text-danger">*</small></label>
                                    <input type="text"class="form-control" id="title" name="google_analytics" placeholder="Enter  Google Analytics" value="{{ $seo->google_analytics }}">
                                </div>
                                @error('google_analytics')
                                    <div class="alert alert-danger">
                                        <div class="alert-body">
                                            {{ $message }}
                                        </div>
                                    </div>
                                @enderror
                            </div>

                             <div class="col-12">
                                <div class="form-group">
                                    <label for="google_analytics">Google Adsens<small class="text-danger">*</small></label>
                                    <input type="text"class="form-control" id="title" name="google_adsens" placeholder="Enter  Google Verification" value="{{ $seo->google_adsens }}">
                                </div>
                                @error('google_adsens')
                                    <div class="alert alert-danger">
                                        <div class="alert-body">
                                            {{ $message }}
                                        </div>
                                    </div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="short_description">Meta Description <small class="text-danger">*</small></label>
                                    <div>
                                        <textarea name="meta_description" placeholder="Underground Short Description" class="form-control">{{$seo->meta_description}}</textarea>
                                     </div>
                                </div>
                                @error('meta_description')
                                    <div class="alert alert-danger">
                                        <div class="alert-body">
                                            {{ $message }}
                                        </div>
                                    </div>
                                @enderror
                            </div>
                            

                            <div class="col-12">
                                <button type="submit" class="btn btn-success waves-effect waves-float waves-light w-100 w-sm-auto">Update</button>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection




