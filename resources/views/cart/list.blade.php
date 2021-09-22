@foreach($products as $product)
<section class="pt-4 pt-md-11">
    <div class="container">
        <div class="row align-items-center">
            <div class="user_id" hidden>
                {{ Auth::user()->id }}
            </div>
            <div class="prod_id" hidden>
                {{ $product->id }}
            </div>
            <div class="col-12 col-md-5 col-sm-6">
                <div class="hover column">
                    <figure><img src="../image/{{ $product->image }}" class="w-75" alt="image"/></figure>
                </div>
            </div>
            <div class="col-12 col-md-7 col-lg-6 ">

                <!--Product Details -->
                <h3 class="text-left text-sm-start">
                {{ $product->prodname }}       
                </h3>
                
                <p class="lead text-left text-md-start text-muted mb-6 mb-lg-8">
                {{ $product->details }}
                </p>

                <p class="text-left text-sm-start">
                    <strong>Price:</strong>  
                    ₹<span id="price_{{$product->id}}">{{ $product->price }}</span>      
                </p>

                <p>
                    <strong>Qty: </strong>
                    <input type="number" id="qty_{{ $product->id }}" class="quantity" name="qty" min="1" max="5">
                    <span>{{ $product->qty }}</span>
                </p>

                <!-- Buttons -->
                <div class="text-left text-md-start">
                    <a id="addtocart_{{$product->id}}" class="btn btn-outline-success shadow lift me-1 cart">Add to Cart</a>
                </div>
            </div>
        </div> <!-- / .row -->
    </div> <!-- / .container -->
</section>
@endforeach
