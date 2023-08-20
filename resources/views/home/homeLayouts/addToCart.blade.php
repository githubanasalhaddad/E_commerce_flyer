@extends('home.app')
@section('contentHome')
    <br>
    <div class="container">
        <h1>Add To Cart</h1>
        @if (session()->has('massage'))
            <div class="alert alert-success">
                {{ session()->get('massage') }}
            </div>
        @endif
        <br>
        <div class="row">
            <div class="col-12">
                @include('layout.alertDanger')
                <div class="table-responsive">
                    <table class="table">
                        <tr>

                            <th>Product Name</th>
                            <th>Product Image</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Action</th>
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
                                <th><img src="{{ asset($img) }}" style="height: 50px" alt=""></th>
                                <th>{{ $item->quantity }}</th>
                                <th>$ {{ $item->price }}</th>
                                <th>
                                    <form method="post" action="{{ route('deleteProductFromCart', $item->id) }}">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">Remove</button>
                                    </form>
                                </th>
                            </tr>

                            @php
                                $total = $total + $item->price;
                            @endphp
                        @endforeach
                        @if ($total > 0)
                            <tr>
                                <td>Total</td>
                                <td>{{ $total }}</td>


                                <td><a href="{{route('shippingAddress')}}" class="btn btn-primary">Checkout</a></td>


                            </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>

    </div>
    <br><br><br>
    <br><br><br>
@endsection
