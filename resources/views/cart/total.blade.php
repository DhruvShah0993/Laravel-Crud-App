@extends('layouts.app')

@section('content')

@foreach($carts as $cart)
<section class="pt-4 pt-md-11">
    <div class="container">
        <div class="row align-items-center">
            <div class="prod_id" hidden>
                {{ Auth::user()->id }}
            </div>
            <div class="prod_id" hidden>
                {{ $cart->id }}
            </div>
            <div>
                <div class="hover column">
                    <figure><img src="../image/{{ $cart->image }}" alt="image" width="250px" /></figure>
                </div>
            </div>
            <div class="col-12 col-md-7 col-lg-6">

                <!--Product Details -->
                <h3 class="text-left text-sm-start">
                    {{ $cart->prodname }}       
                </h3>
                
                <p class="text-left text-sm-start">
                    <strong>Price:</strong>  
                    ₹<span id="price_{{$cart->id}}">{{ $cart->price }}</span>      
                </p>

                <p>
                    <strong>Qty: </strong>
                    <input type="text" id="qty_{{ $cart->id }}" class="quantity w-25" name="qty" min="1" max="5" value="{{ $cart->qty }}" disabled>
                </p>
               
                <!-- Buttons -->
                <a href="/cart/{{$cart->id}}" id="remove" class="btn btn-danger shadow lift me-1 remove">
                        Remove
                </a>
              
            </div>
        </div> <!-- / .row -->
    </div> <!-- / .container -->
</section>
@endforeach

<div class="container">
    <div class="row justify-content-end">
        <div class="col-6">
            <div class="text-md-end">
                <p class="text-left text-sm-start"> 
                    <strong>Sub Total:</strong>
                    ₹<span> {{$subtotal}} </span>
                </p>
            
                <a href="{{ route('checkout.index') }}" id="checkout" class="btn btn-success shadow lift me-1 checkout">
                        Checkout
                </a>
                <a href="{{ route('cart.index') }}" id="continue-shop" class="btn btn-warning shadow lift me-1 continue-shop">
                        Continue Shopping
                </a>
            </div>
        </div>
    </div>
</div>
@endsection