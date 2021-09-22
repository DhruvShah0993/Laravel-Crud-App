@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success')}}
        </div>
        @endif
    </div>
    <div class="title">
        <h2>Checkout Form</h2>
    </div>
<form action="{{ route('cart.add') }}" method="GET">
    <div class="row">
        <div class="col-8">
            <div class="form-group">
                <label> Name </label>
                <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                @if($errors->has('name'))
                    <div class="text-danger">{{ $errors->first('name') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label>Address</label>
                <textarea type="text" name="address" class="form-control" rows="3" placeholder="Enter Your Address" autocomplete="off"></textarea>
                @if($errors->has('address'))
                    <div class="text-danger">{{ $errors->first('address') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label>Contact</label>
                <input type="tel" name="contact" class="form-control" placeholder="Enter Contact number" autocomplete="off"> 
                @if($errors->has('contact'))
                    <div class="text-danger">{{ $errors->first('contact') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label>Country</label> 
                <select type="text" name="country" id="country" class="form-control"> 
                    <option value="">Select Country</option>
                    @foreach($countries as $country) 
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('country'))
                    <div class="text-danger">{{ $errors->first('country') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label>State</label> 
                <select type="text" name="state" id="state" class="form-control">
                </select>
                @if($errors->has('state'))
                    <div class="text-danger">{{ $errors->first('state') }}</div>
                @endif 
            </div>
            <div class="form-group">
                <label>Town / City</label> 
                <select type="text" name="city" id="city" class="form-control"> 
                </select>
                @if($errors->has('city'))
                    <div class="text-danger">{{ $errors->first('city') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label>Email Id</label>
                <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
                @if($errors->has('email'))
                    <div class="text-danger">{{ $errors->first('email') }}</div>
                @endif 
            </div>
        </div>
        <div class="col-4">
            <div class="Yorder">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Qty</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                
                <tbody>
                @foreach($carts as $check)
                    <tr>
                        <td>{{ $check->prodname }}</td>
                        <td>{{ $check->qty }}</td>
                        <td>{{ $check->total_amount }}</td>                        
                    </tr>
                @endforeach
                </tbody>
            </table>
                <div class="form-group">
                    <p class="text-center text-sm-start"> 
                        <strong>Sub Total:</strong>
                        ₹<span> {{$subtotal}} </span>
                    </p>
                </div>
                <button type="submit" name="porder">Place Order</button>
            </div><!-- Yorder -->
        </div>
    </div>
</form>
</div>
   
<script>

    $(document).ready(function () {
        $('#country').on('change', function() {
            var country_id = $(this).val();
            $('#state').html('');            
            $.ajax ({
                url: '{{ route('checkout.getState') }}',
                type: "POST",
                
                data: {
                    country_id : country_id,
                    _token: '{{ csrf_token() }}',
                },
                datatype: "json",
                success: function(result){
                    
                    $('#state').html('<option value="">Select State</option>');
                    $.each(result, function(key, value){
                     
                        $('#state').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                    $('#city').html('<option value="">Select City</option>');
                }
            });
        }); 
        $('#state').on('change', function() {
            var state_id = $(this).val();
            $('#city').html('');
            $.ajax({ 
                url: '{{ route('checkout.getCity') }}',
                type: "POST",
                data: {
                    state_id: state_id,
                    _token: '{{ csrf_token() }}',
                },
                dataType : 'json',
                success: function(res){
                    $('#city').html('<option value="">Select City</option>');
                    $.each(res, function(key, value){
                        $('#city').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        });
    });   
            
</script>
    
@endsection
