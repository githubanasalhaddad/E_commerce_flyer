@extends('home.app')
@section('contentHome')
    <h2 class="py-5"></h2>
    <div class="fashion_section">
        <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <h1 class="fashion_taital">All Products</h1>
                        <div class="fashion_section_2">
                            <div class="row">

                                @foreach ($allProducts as $allProduct)
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="box_main">
                                            <h4 class="shirt_text">{{ $allProduct->name}}</h4>
                                            <p class="price_text">Price <span style="color: #262626;">$ {{ $allProduct->price}}</span></p>
                                            <div class="tshirt_img"><img src="{{ asset($allProduct->img) }}">
                                            </div>
                                            <div class="btn_main">
                                                <form action="{{ route('addProductToCart') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="ProductId" id="" value="{{ $allProduct->id }}">
                                                    <input type="hidden" name="price" id="" value="{{ $allProduct->price }}">
                                                    <input type="hidden" name="quntity" id="" value="1">
                                                    <input type="submit" class="buy_bt btn-success" value="Buy New" name="AddToCart" id="AddToCart">
                                                </form>

                                            
                                                <div class="seemore_bt"><a href="{{route('singleProduct',[$allProduct->id,$allProduct->slug])}}">See More</a></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                              
                                   
                                    {{-- <div class="btn btn-warning"><a href="#">Add to cart</a></div> --}}
                
                            


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
