@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header navbar navbar-light" style="background-color: #00BFFF;">{{ __('Dashboard') }}</div>

                <div style="background-color: #9AFEFF;">
                    @if(Auth::user()->role_id == 1)
                    <center><h1>Welcome {{ Auth::user()->name }}</h1></center><br>

                    <a class="btn btn-primary ml-2 mb-2" href="{{ route('products.index') }}">Product Details</a>

                    <a class="btn btn-secondary ml-2 mb-2" href="{{ route('category.index') }}">Category Details</a>

                    <a class="btn btn-warning ml-2 mb-2" href="{{ route('order.show') }}">Order Details</a>
                    @endif

                    @if(Auth::user()->role_id == 2)
                    <center><h1>Welcome {{ Auth::user()->name }}</h1></center><br>

                    <a class="btn btn-primary ml-2 mb-2" href="{{ route('cart.index') }}">Choose Product</a>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

