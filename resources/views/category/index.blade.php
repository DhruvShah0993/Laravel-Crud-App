@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <h1>Category Details</h1>
        </div>
        @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success')}}
        </div>
        @endif
    </div>
    <div class="row">
        <div>
            <a class="btn btn-outline-success mb-2" href="{{ route('category.create') }}">Add New Category</a>
        </div>

    </div>

    <hr>
   <table class="table table-bordered data-table">
       <thead>
           <th>Id</th>
           <th>Category Name</th>
            <th width="200px">Action</th>
        </thead>

        <!-- @foreach($category as $cat) -->
        <tbody>
        
            <!-- <td>{{ $cat->id }}</td>
            <td>{{ $cat->name }}</td>
            <td>{{ $cat->details }}</td>
            <td>{{ $cat->price }}</td>
            <td>
                <form action="{{ route('category.index', $cat->id) }}" method="GET">

                    <a href="{{ route('category.edit', $cat->id) }}" class="btn btn-outline-info">Edit</a>

                    <a href="{{ route('category.destroy', $cat->id) }}" class="btn btn-outline-danger">DELETE</a>
                    
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
        ajax: "{{ route('category.index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'action', name: 'action', orderable: true, searchable: true}, 
        ]
    });
} );
</script>

@endpush