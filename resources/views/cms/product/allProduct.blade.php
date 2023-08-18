@extends('index')
@section('title', 'Show All Product')
@section('smallTitle', 'Show All Product')
@section('content')
    {{-- <div class="container"> --}}
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Show all Product</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Img</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>
                                        <img style="height: 60px" src="{{ asset($product->img) }}" alt="">
                                        <br>
                                        <a href="" class="btn btn-primary">Update Image</a>
                                    </td>
                                    <td>{{$product->price}}</td>
                                   
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{route('product.edit',$product->id)}}" class="btn btn-info">Edit</a>
                                            <form action="{{route('product.destroy',$product->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger">Delete</button>
                                            </form>

                                        </div>
                                    
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    {{-- </div> --}}

@endsection
