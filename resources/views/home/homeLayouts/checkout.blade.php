@extends('home.app')
@section('contentHome')
    <br>
    <div class="container">
        <h1>Checkout </h1>
        @if (session()->has('massage'))
            <div class="alert alert-success">
                {{ session()->get('massage') }}
            </div>
        @endif


        <div class="row">
            <div class="col-8">
                <div class="box_main">
                    <h3> Product Will send At-</h3>
                    <p>City/Village -{{ $shipping_address->city_name }}</p>
                    <p>Postal Code -{{ $shipping_address->postal_code }}</p>
                    <p>Phome Number -{{ $shipping_address->phone_number }}</p>

                </div>

            </div>
            <div class="col-4">
                <div class="box_main">
                    Your Final Product Are -
                    <div class="table-responsive">
                        <table class="table">
                            <tr>

                                <th>Product Name</th>

                                <th>Quantity</th>
                                <th>Price</th>

                            </tr>

                            @php
                                $total = 0;
                            @endphp

                            @foreach ($cart_item as $item)
                                @php
                                    $product_name = App\Models\Product::where('id', $item->product_id)->value('name');
                                    $img = App\Models\Product::where('id', $item->product_id)->value('img');
                                @endphp
                                <tr>


                                    <th>{{ $product_name }}</th>

                                    <th>{{ $item->quantity }}</th>
                                    <th>$ {{ $item->price }}</th>

                                </tr>

                                @php
                                    $total = $total + $item->price;
                                @endphp
                            @endforeach
                            @if ($total > 0)
                                <tr>
                                    <td>Total</td>
                                    <td>{{ $total }}</td>

                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
            <form action="{{ route('placeOrder') }}" method="post">
                @csrf
                <input type="submit" value="Place Order" class="btn btn-primary mr-3">
            </form>
            <form action="" method="post">
                @csrf
                <input type="submit" value="Cancel Order" class="btn btn-danger ">
            </form>
        </div>
    </div>
    <br><br>
    <br><br>
@endsection
