@extends('layouts.app')

@section('content')

<div class="container">
    <div class="d-flex justify-content-end">
        <ul>
        @if ($total_qty == 0)
        <a href="#" onclick="alert('Your cart is empty')" type="button" class="btn btn-warning position-relative shadow lift me-1">
            <i class="fa fa-shopping-cart icon-large"></i> Cart
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    {{ $total_qty }}
            <span class="visually-hidden" hidden>unread messages</span>
            </span>
        </a>
        @else
        <a href="{{ route('cart.total') }}" type="button" class="btn btn-warning position-relative shadow lift me-1">
            <i class="fa fa-shopping-cart icon-large"></i> Cart
            <span id="checkout-count" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    {{ $total_qty }}
            <span class="visually-hidden" hidden>unread messages</span>
            </span>
        </a>
        @endif
        </ul>
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <h1>Welcome {{ Auth::user()->name }}</h1><br>
        </div>
        @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success')}}
        </div>
        @endif
    </div>
    <div class="row">
        <div class="form-group">
            <select name="prodname" class="form-control prod_id" id="select_prod">
                <option value="">---Select Product---</option>
                    @foreach($products as $product)
                    <option value= "{{$product->id}}">{{$product->prodname}}</option>
                @endforeach        
            </select> 
        </div>
        <ul>
            <a class="btn btn-outline-danger shadow lift me-1" href="{{ route('home') }}">Back</a>
        </ul>
    </div>
</div>
<hr>

<div class="container product_details">
    @include('cart.list')
</div>

@endsection

@push('scripts')

<script>
$( document ).ready(function() {
    $('body').on('click', '.cart', function () {
        var id = $(this).attr('id');
          
        var prod_id = id.replace("addtocart_","");
        // alert(prod_id);
        var price = $("#price_" + prod_id).html();
        // alert(price);
        var qty = $("#qty_" + prod_id).val();
        // alert(total_qty);dbg
        // var count = $(this).attr('count');
        // alert(count);
        $.ajax({
            type: "POST",
            url: "{{ route('cart.store') }}",
            // datatype: 'json',
            data: {
                "_token": "{{ csrf_token() }}",
                price : price,
                prod_id : prod_id,
                qty : qty,
            },
            success: function(data)
            {
                console.log(data);
                alert('Item added to the cart');
                $('#checkout-count').text(data);
            }
        });
    });
});


$(document).ready( function () {
    $('#select_prod').on('change', function() {
        var prod_id = $('.prod_id').val();
        // alert(prod_id);
        $.ajax({
            url: "{{ route('cart.list') }}",
            datatype: 'json',
            data: {
                prod_id : prod_id,
            },
            success: function(data){
                // alert('HELLO', data);
                $('.product_details').html(data);
            }
        });
    });
});

</script>

@endpush
