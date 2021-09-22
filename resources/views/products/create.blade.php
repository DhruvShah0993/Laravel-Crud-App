@extends('layouts.app')

@section('content')

    <div class="container justify-content-center">
        <h2>Add Product</h2>
        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="prodname">Product Name</label>
                <input type="text" class="form-control" id="prodname" name="prodname" placeholder="Enter Product Name" autocomplete="off">
                @if($errors->has('prodname'))
                    <div class="text-danger">{{ $errors->first('prodname') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="details">Product Details</label>
                <textarea class="form-control" id="details" name="details" rows="3" placeholder="Enter Product Details" autocomplete="off"></textarea>
                @if($errors->has('details'))
                    <div class="text-danger">{{ $errors->first('details') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="price">Product Price</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="Enter Product Price" autocomplete="off">
                @if($errors->has('price'))
                    <div class="text-danger">{{ $errors->first('price') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="image" class="form-label">Product Image</label>
                <input type="file" class="form-control" id="image" name="image">
                @if($errors->has('image'))
                    <div class="text-danger">{{ $errors->first('image') }}</div>
                @endif
            </div>
            <div class="form-group">
            <label for="cat_id">Product Category</label>
            <select id="cat_id" class="form-control" name="cat_id">
                <option value="">--- Select Category ---</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach 
            </select>
            @if($errors->has('cat_id'))
                <div class="text-danger">{{ $errors->first('cat_id') }}</div>
            @endif
        </div>
            <div class="form-group col-xs-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    @yield('content')
@endsection

