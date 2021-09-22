@extends('layouts.app')

@section('content')

    <div class="container justify-content-center">
        <h2>Update Product</h2>
        <form action="{{ route('products.update', $products->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="prodname">Product Name</label>
                <input type="text" class="form-control" name="prodname" value="{{ $products->prodname }}">
                @if($errors->has('prodname'))
                    <div class="text-danger">{{ $errors->first('prodname') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="details">Product Details</label>
                <textarea class="form-control" name="details" rows="3" value="{{ $products->details }}">{{ $products->details }}</textarea>
                @if($errors->has('details'))
                    <div class="text-danger">{{ $errors->first('details') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="price">Product Price</label>
                <input type="text" class="form-control" name="price" value="{{ $products->price }}">
                @if($errors->has('price'))
                    <div class="text-danger">{{ $errors->first('price') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="image">Product Image : ({{ $products->image }})</label>
                <input type="file" class="form-control" name="image" value="{{ $products->image }}">
               
                <img src="/image/{{ $products->image }}" width="100px" alt="Image">
                @if($errors->has('image'))
                    <div class="text-danger">{{ $errors->first('image') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="cat_id">Product Category</label>
                <select class="form-control" name="cat_id">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ ($category->id == $products->cat_id) ? 'selected':'' }}>{{ $category->name }}</option>
                    @endforeach
                </select>      
            </div>
            <div class="form-group col-xs-12 col-md-12 text-center">
                <button type="submit" class="btn btn-outline-primary">Submit</button>
                <a href="{{ route('products.index') }}" type="submit" class="btn btn-outline-dark">Back</a>
            </div>
        </form>
    </div>
    @yield('content')
@endsection