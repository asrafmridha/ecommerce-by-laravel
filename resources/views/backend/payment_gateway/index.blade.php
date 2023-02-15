@extends('backend.mastaring.master')

{{-- Title --}}
@section('title')
    Payment Gateway
@endsection

{{-- Active Menu --}}
@section('setting')
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
                                Payment Gateway
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
                            
                            @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            @if (session('warning'))
                                <div class="alert alert-warning">{{ session('warning') }}</div>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <h4 class="card-title">AmarPay Payment Gateway</h4>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="email">Signature Key</label>
                                            <input type="text" name="company_name" value="" id="email" class="form-control" placeholder=""/>
                                            @error('company_name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="email">StoreId</label>
                                            <input type="text" name="company_name" value="" id="email" class="form-control" placeholder=""/>
                                            @error('company_name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary waves-effect waves-float waves-light w-100 w-sm-auto">update</button>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="card-title">SurjoPay Payment Gateway</h4>
                                     <div class="col-12">
                                        <div class="form-group">
                                            <label for="email">Signature Key</label>
                                            <input type="text" name="company_name" value="" id="email" class="form-control" placeholder=""/>
                                            @error('company_name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="email">StoreId</label>
                                            <input type="text" name="company_name" value="" id="email" class="form-control" placeholder=""/>
                                            @error('company_name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary waves-effect waves-float waves-light w-100 w-sm-auto">update</button>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="card-title">Ssl Commerz Payment Gateway</h4>
                                     <div class="col-12">
                                        <div class="form-group">
                                            <label for="email">Signature Key</label>
                                            <input type="text" name="company_name" value="" id="email" class="form-control" placeholder=""/>
                                            @error('company_name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="email">StoreId</label>
                                            <input type="text" name="company_name" value="" id="email" class="form-control" placeholder=""/>
                                            @error('company_name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary waves-effect waves-float waves-light w-100 w-sm-auto">update</button>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div> 
@endsection