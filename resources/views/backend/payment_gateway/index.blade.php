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
                                    <form action="{{ route('amarpay.update',$amarpay->id) }}" method="POST">
                                    @csrf
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="amarpay_gateway_name">Signature Key</label>
                                                <input type="text" name="amarpay_gateway_name" value="{{ $amarpay->gateway_name }}" id="email" class="form-control" placeholder=""/>
                                                @error('amarpay_gateway_name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="amarpay_store_id">StoreId</label>
                                                <input type="text" name="amarpay_store_id" value="{{ $amarpay->store_id }}" id="email" class="form-control" placeholder=""/>
                                                @error('amarpay_store_id')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary waves-effect waves-float waves-light w-100 w-sm-auto">update</button>
                                        </div>
                                    </form>
                                </div>
                                   
                                <div class="col-md-4">
                                    <h4 class="card-title">SurjoPay Payment Gateway</h4>
                                     <div class="col-12">
                                        <div class="form-group">
                                            <label for="surjopay_gateway_name">Signature Key</label>
                                            <input type="text" name="surjopay_gateway_name" value="{{ $surjopay->gateway_name }}" id="email" class="form-control" placeholder=""/>
                                            @error('surjopay_gateway_name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="surjopay_store_id">StoreId</label>
                                            <input type="text" name="surjopay_store_id" value="{{ $surjopay->store_id }}" id="email" class="form-control" placeholder=""/>
                                            @error('surjopay_store_id')
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
                                            <label for="sslcommerz_gateway_name">Signature Key</label>
                                            <input type="text" name="sslcommerz_gateway_name" value="{{ $sslcommerz->gateway_name }}" id="email" class="form-control" placeholder=""/>
                                            @error('sslcommerz_gateway_name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="sslcommerz_store_id">StoreId</label>
                                            <input type="text" name="sslcommerz_store_id" value="{{ $sslcommerz->store_id }}" id="email" class="form-control" placeholder=""/>
                                            @error('sslcommerz_store_id')
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