@extends('Admin.layout')

@section('css')
    <link id="app-css" rel="stylesheet"
        href="{{ session('locale', 'en') == 'ar' ? asset('assets/Admin/compiled/css/table-datatable.rtl.css') : asset('assets/Admin/compiled/css/table-datatable.css') }}" />
@endsection
@section('js')
    <script src="{{ asset('assets/Admin/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/Admin/static/js/pages/simple-datatables.js') }}"></script>
@endsection

@section('body')
@include("success")
@include("errors")

    <div class="card">
        <div class="card-body">

            <table id="table1" class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Order ID</th>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                            <td>{{ $order->order_id }}</td>
                            <td>{{ $order->product->name }}</td>
                            <td>{{ $order->price }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>{{ $order->order->total_price }}</td>
                            {{-- <td><img src="{{ asset("storage/{$order->image}") }}" width="100px" alt=""></td> --}}
                            {{--<td> <img src="{{$order->getFirstMediaUrl('images');}}" alt="" srcset=""></td>
                            <td>
                                <a class="btn btn-success" href="{{ url("admin/orders/show/$product->id") }}">Show</a>
                            </td>--}}
                        </tr>
                        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection