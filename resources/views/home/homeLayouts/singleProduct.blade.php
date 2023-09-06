@extends('home.app')
@section('contentHome')
    <div class="container">
        <hr><br>
        <div class="row">
            <div class="col-lg-4">
                <div class="box_main">
                    <div class="tshirt_img"><img src="{{ asset($products->img) }}"></div>
                </div>

            </div>
            <div class="col-lg-8">
                <div class="product-info">
                    <br>
                    <h4 class="shirt_text text-left">{{ $products->name }}</h4>

                    <br>
                    <p class="price_text text-left">Price <span style="color: #262626;">$ {{ $products->price }}</span></p>
                </div>
                <br>
                <div class="my-3 product-details">
                    <p class="lead">{{ $products->longDescr }}</p>
                    {{-- <p>Category - {{$products->categoryName}}</p>
                        <p>SUB Category - {{$products->subCategoryName}}</p>
                        <p>Available Quantity - {{$products->count}}</p> --}}
                    <ul class="py-2 bg-light my-2">
                        <li>Category - {{ $products->categoryName }}</li>
                        <li>SUB Category - {{ $products->subCategoryName }}</li>
                        <li>Available Quantity - {{ $products->count }}</li>
                    </ul>
                </div>
                <div class="btn_main">
                    <form action="{{ route('addProductToCart') }}" method="post">
                        @csrf
                        <input type="hidden" name="price" value="{{ $products->price }}">
                        <input type="hidden" name="ProductId" id="" value="{{ $products->id }}">
                        <input type="number" name="quntity" id="quantityProduct" min="1"
                            placeholder="Enter the quantity"
                            class="@error('quantity')is-invalid
                                
                            @enderror">
                        @error('quantity')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror

                        <input type="submit" class="btn btn-warning" value="Add To Cart" name="AddToCart" id="AddToCart">
                    </form>
                    {{-- <div class="btn btn-warning"><a href="#">Add to cart</a></div> --}}

                </div>
            </div>
        </div>
    </div>


    <div class="fashion_section">
        <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <h1 class="fashion_taital">Related Products
                        </h1>
                        <div class="fashion_section_2">
                            <div class="row">

                                @foreach ($Relatedproducts as $Relatedproduct)
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="box_main">
                                            <h4 class="shirt_text">{{ $Relatedproduct->name }}</h4>
                                            <p class="price_text">Price <span style="color: #262626;">$
                                                    {{ $Relatedproduct->price }}</span></p>
                                            <div class="tshirt_img"><img src="{{ asset($Relatedproduct->img) }}">
                                            </div>
                                            <div class="btn_main">
                                                {{-- <div class="buy_bt"><a href="">Buy Now</a></div> --}}


                                                <form action="{{ route('addProductToCart') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="ProductId" id=""
                                                        value="{{ $Relatedproduct->id }}">
                                                    <input type="hidden" name="price" id=""
                                                        value="{{ $Relatedproduct->price }}">
                                                    <input type="hidden" name="quntity" id="" value="1">
                                                    <input type="submit" class="buy_bt btn-success" value="Buy New"
                                                        name="AddToCart" id="AddToCart">
                                                </form>

                                                <div class="seemore_bt"><a
                                                        href="{{ route('singleProduct', [$Relatedproduct->id, $Relatedproduct->slug]) }}">See
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
