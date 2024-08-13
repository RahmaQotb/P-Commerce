@extends('Admin.layout')
@section('body')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

</head>
<body>
  {{-- <div>
    {!! $dataTable->table() !!} <!-- This will render the DataTable -->
</div> --}}
    <table id="products-table" class="table">
        <thead>
          <tr>
            <th scope="col">Product ID</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($products as $product )
          <tr>
              <th scope="row">{{$loop->iteration}}</th>
            <td>{{$product->name}}</td>
            <td>{{$product->desc}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->quantity}}</td>
            <td><img src="{{asset("storage/$product->image")}}" width="100px" alt=""></td>
            <td>
                <a class="btn btn-success" href="{{url("products/show/$product->id")}}">Show</a>
            </td>
        </tr>
        @endforeach
        </tbody>
      </table>
      <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script>
   $(document).ready(function() {
        $('products-table').DataTable();
    });
</script>
</body>
</html>
@endsection
