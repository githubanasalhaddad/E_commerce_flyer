<<<<<<< HEAD

=======
@extends('index')
@section('title', 'Pending Order - Single Ecomerce')
@section('content')

    <div class="container">
        <div class="row">
        <div class="card-title">Pending Orders</div>
    </div>
    <br>
        <div class="card">

            <div class="card-body">

                <table class="table">
                    <tr>
                        <th>User Id</th>
                        <th>Shipping Information </th>
                        <th>Product Id</th>
                        <th>Quantity</th>
                        <th>Total Wil Pay</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>

                    @foreach ($pending_orders as $item)
                        <tr>
                            <th>{{ $item->user_id }}</th>
                            <th>
                                <ul>
                                    <li>Phone Number - {{ $item->shipping_phoneNumber }}</li>
                                    <li>City - {{ $item->shipping_city }}</li>
                                    <li>Postal Code - {{ $item->shipping_postcode }}</li>
                                </ul>
                            </th>
                            <th>{{ $item->product_id }}</th>
                            <th>{{ $item->quantity }}</th>
                            <th>{{ $item->total_price }}</th>
                            <th>{{ $item->status }}</th>
                            <th><a href="" class="btn btn-success">Approve Now</a></th>
                        </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>
@endsection
>>>>>>> master
