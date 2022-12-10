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
                <a href="">Smtp Update </a>
            </li>
        </ol>
    </div>
@endsection
@section('content') 

{{-- Main Content --}}
@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{ route('seo.update',$smtp->id) }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update Smtp</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">                           
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Mail Mailer<small class="text-danger">*</small></label>
                                    <input type="text" class="form-control" id="title" name="mailer" placeholder="Enter Mail Mailer" value="{{ $smtp->mailer }}">
                                </div>
                                @error('mailer')
                                    <div class="alert alert-danger">
                                        <div class="alert-body">
                                            {{ $message }}
                                        </div>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">                           
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Mail Host<small class="text-danger">*</small></label>
                                    <input type="text" class="form-control" id="title" name="host" placeholder="Enter Mail Host" value="{{ $smtp->host }}">
                                </div>
                                @error('host')
                                    <div class="alert alert-danger">
                                        <div class="alert-body">
                                            {{ $message }}
                                        </div>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">                           
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Mail Port<small class="text-danger">*</small></label>
                                    <input type="text" class="form-control" id="title" name="port" placeholder="Enter Mail Port" value="{{ $smtp->port }}">
                                </div>
                                @error('port')
                                    <div class="alert alert-danger">
                                        <div class="alert-body">
                                            {{ $message }}
                                        </div>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">                           
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Mail User Name<small class="text-danger">*</small></label>
                                    <input type="text" class="form-control" id="title" name="user_name" placeholder="Enter Mail User Name" value="{{ $smtp->user_name }}">
                                </div>
                                @error('user_name')
                                    <div class="alert alert-danger">
                                        <div class="alert-body">
                                            {{ $message }}
                                        </div>
                                    </div>
                                @enderror
                            </div>
                        </div>

                         <div class="row">                           
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Mail Password<small class="text-danger">*</small></label>
                                    <input type="text" class="form-control" id="title" name="password" placeholder="Enter Mail Password" value="{{ $smtp->password }}">
                                </div>
                                @error('password')
                                    <div class="alert alert-danger">
                                        <div class="alert-body">
                                            {{ $message }}
                                        </div>
                                    </div>
                                @enderror
                            </div>
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




