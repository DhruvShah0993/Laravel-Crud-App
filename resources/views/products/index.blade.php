@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <h1>Product Details</h1>
        </div>
        @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success')}}
        </div>
        @endif
    </div>
    <div class="row">
        <div>
            <a class="btn btn-outline-success mb-2" href="{{ route('products.create') }}">Add New Product</a>
        </div>

    </div>

<hr>
   <table class="table table-bordered data-table">
       <thead>
           <th>Id</th>
           <th>Product Name</th>
           <th>Product Details</th>
           <th>Product Price</th>
           <th>Product Image</th>
           <th>Category</th>
            <th width="200px">Action</th>
        </thead>

        <!-- @foreach($products as $product) -->
        <tbody>
        
            <!-- <td>{{ $product->id }}</td>
            <td>{{ $product->prodname }}</td>
            <td>{{ $product->details }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->name }}</td>
            <td>
                <form action="{{ route('products.index', $product->id) }}" method="GET">

                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-outline-info">Edit</a>

                    <a href="{{ route('products.destroy', $product->id) }}" class="btn btn-outline-danger">DELETE</a>
                    
                    @csrf
                    @method('DELETE')
                </form>
            </td> -->
            
        </tbody>
        <!-- @endforeach -->
        
   </table>
</div>

    @yield('content')
@endsection

@push('scripts')
<script type="text/javascript">
$(document).ready( function () {
    $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('products.index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'prodname', name: 'prodname'},
            {data: 'details', name: 'details'},
            {data: 'price', name: 'price'},
            // {data: 'image', name: 'image'},
            {
                "data": "image",
                "render": function(data, type, row) {
                    return '<img src="/image/'+data+'" width="100px" />';
                }
            },
            {data: 'name', name: 'name'},
            {data: 'action', name: 'action', orderable: true, searchable: true}, 
        ]
    });
} );
</script>

@endpush