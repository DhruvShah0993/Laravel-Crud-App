@extends('layouts.app')

@section('content')

    <div class="container justify-content-center">
        <h2>Add Category</h2>
        <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Category Name" autocomplete="off">
                @if($errors->has('name'))
                    <div class="text-danger">{{ $errors->first('name') }}</div>
                @endif
            </div>
            <div class="form-group col-xs-12 col-md-12 text-center">
                <button type="submit" class="btn btn-outline-primary">Submit</button>
            </div>
        </form>
    </div>
    @yield('content')
@endsection

