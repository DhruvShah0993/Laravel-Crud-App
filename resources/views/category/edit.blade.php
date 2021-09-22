@extends('layouts.app')

@section('content')

    <div class="container justify-content-center">
        <h2>Update Category</h2>
        <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" class="form-control" name="name" value="{{ $category->name }}">
                @if($errors->has('name'))
                    <div class="text-danger">{{ $errors->first('name') }}</div>
                @endif
            </div>
            <div class="form-group col-xs-12 col-md-12 text-center">
                <button type="submit" class="btn btn-outline-primary">Submit</button>
                <a href="{{ route('category.index') }}" type="submit" class="btn btn-outline-dark">Back</a>
            </div>
        </form>
    </div>
    @yield('content')
@endsection