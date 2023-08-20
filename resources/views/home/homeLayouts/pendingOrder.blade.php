@extends('home.app')
@section('contentHome')
    <div class="container">
        <br><br>
        @if (session()->has('massage'))
            <div class="alert alert-success">
                {{ session()->get('massage') }}
            </div>
        @endif
        <h1>Pending Order</h1>
        <div class="row">
            <div class="col-5">
                <ul>
                    <li><a href="">Dachboard</a></li>
                    <li><a href="">Pending Order</a></li>
                    <li><a href="">History</a></li>
                    <li><a href="">Lagout</a></li>
                </ul>

            </div>


            <div class="col-7">
                <table class="table">
                    <th>Product Id</th>
                    <th>Preice</th>
                    <th></th>
                    <th></th>


                    @foreach ($pending_orders as $order)
                        <tr>
                            <td>{{ $order->product_id }}</td>
                            <td>{{ $order->total_price }}</td>
                        </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
@endsection
