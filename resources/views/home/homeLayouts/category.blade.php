@extends('home.app')
@section('contentHome')
    <br>
    <h1 class="container"></h1>
    <div class="fashion_section">
        <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">

                        <h1 class="fashion_taital">-  {{ $category->name }}  -
                        </h1>
                        <div class="fashion_section_2">
                            <div class="row">

                                @foreach ($products as $product)
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="box_main">
                                            <h4 class="shirt_text">{{ $product->name }}</h4>
                                            <p class="price_text">Price <span style="color: #262626;">$
                                                    {{ $product->price }}</span></p>
                                            <div class="tshirt_img"><img src="{{ asset($product->img) }}">
                                            </div>
                                            <div class="btn_main">
                                                <form action="{{ route('addProductToCart') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="ProductId" id=""
                                                        value="{{ $product->id }}">
                                                    <input type="hidden" name="price" id=""
                                                        value="{{ $product->price }}">
                                                    <input type="hidden" name="quntity" id="" value="1">
                                                    <input type="submit" class="buy_bt btn-success" value="Add To Cart"
                                                        name="AddToCart" id="AddToCart">
                                                </form>




                                                <div class="seemore_bt"><a
                                                        href="{{ route('singleProduct', [$product->id, $product->slug]) }}">See
                                                        More</a></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach




                            </div>
                        </div>
                    </div>
                </div>


            </div>
            {{-- <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a> --}}
        </div>
    </div>
@endsection
