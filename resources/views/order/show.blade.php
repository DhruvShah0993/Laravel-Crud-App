@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <!-- <div id="msg" role="alert" class="alert alert-success alert-dismissible fade show"></div> -->
            <div id="msg"></div>
            <h1>Order Detials</h1>
            <a href="{{ route('export') }}" class="btn btn-success">Export Details</a>
        </div>
        <!-- <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <button class="w-50 btn btn-warning">Import Order Details</button>    
            <input type="file" name="file" class="form-control"><br>
        </form> -->
        @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success')}}
        </div>
        @endif
    </div>

<hr>
   <table class="table table-bordered data-table" id="data-table">
       <thead>
           <tr>
                <th>Id</th>
                <th>User Name</th>
                <th>User Address</th>
                <th>Product Name</th>
                <th>Product Image</th>
                <th>Product Price</th>
                <th>Product Qty</th>
                <th>Sub Total</th>
                <th width="200px">Order Status</th>
           </tr>
        </thead>
       
        <tbody>
        </tbody>
        
   </table>
</div>

@endsection

@push('scripts')

<script type="text/javascript">
$(document).ready( function () {
    $('.data-table').DataTable({
        // console.log('here');
        processing: true,
        serverSide: true,
        ajax: "{{ route('order.show') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'address', name: 'address'},
            {data: 'prodname', name: 'prodname'},
            {
                "data": "image",
                "render": function(data, type, row) {
                    return '<img src="/image/'+data+'" width="100px" />';
                }
            },
            {data: 'price', name: 'price'},
            {data: 'qty', name: 'qty'},
            {data: 'total', name: 'total'},
            {data: 'status', name: 'status', orderable: true, searchable: true}, 
        ]
    });
});
</script>

<script>
var alertPlaceholder = document.getElementById('msg')
var alertTrigger = document.getElementById('liveAlertBtn')

function alert(message, type) {
  var wrapper = document.createElement('div')
  wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible" role="alert">' + message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'

  alertPlaceholder.append(wrapper)
}

if (alertTrigger) {
  alertTrigger.addEventListener('click', function () {
    alert(data.message, 'success')
  })
}
</script>

<script>
$( document ).ready( function() {
    // alert('here');
    $('body').on('change', '.order' , function () {
    //   alert("hello");
        status = $(this).val(); 
        status_array = status.split("_"); 

        var id = status_array[1];  // order id
        var status = status_array[0]; // order status
        // alert(status); 
      
        $.ajax({
                url: "{{ route('order.updateStatus') }}",
                type: 'post',
                datatype: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id : id,
                    status : status,
                },
                success: function(data){
        
                        if(data.success == true){
                            $('#msg').html(data.message);
                           
                        }
                }
        });
    });
});

</script>
@endpush
