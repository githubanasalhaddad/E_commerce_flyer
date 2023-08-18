@extends('index')
@section('title', 'Edit Product')
@section('smallTitle', 'Edit Product')
@section('content')
    <div class="container">
        <form method="post" action="{{ route('product.update', $products->id) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="form-group">

                    @if (session()->has('message'))
                        <div class="alert alert-success alert-dismissible"><button type="button" class="close"
                                data-dismiss="alert" aria-hidden="true">x</button>
                            <h5><i class="icon fas fa-check">Success</i></h5>
                            {{ session('message') }}
                        </div>
                    @endif

                    <label for="name">Product Name</label>
                    <input type="text" name="name" value="{{ $products->name }}"
                        class="form-control @error('name')is-invalid
                    
                @enderror"
                        id="name" placeholder="Enter product Name">
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <hr>
                    <label for="price">Product Price</label>
                    <input type="number" name="price" value="{{ $products->price }}"
                        class="form-control @error('price')is-invalid
                    
                @enderror"
                        id="price" placeholder="Enter product price">
                    @error('price')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <hr>
                    <label for="quantity">Product quantity</label>
                    <input type="number" name="quantity" value="{{ $products->count }}"
                        class="form-control @error('quantity')is-invalid
                    
                @enderror"
                        id="quantity" placeholder="Enter product quantity">
                    @error('count')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror


                    <hr>
                    <label for="shortDescr">Short Description</label>
                    <input type="text" name="shortDescr" value="{{ $products->shortDescr }}"
                        class="form-control @error('shortDescr')is-invalid
                    
                @enderror"
                        id="shortDescr" placeholder="Enter Short Description">
                    @error('shortDescr')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror

                    <hr>

                    <label for="longDescr">Long Description</label>
                    <textarea class="form-control   @error('longDescr')is-invalid
                    
                    @enderror"
                        rows="3" name="longDescr" id="longDescr" placeholder="Enter Long Description">{{ $products->longDescr }}</textarea>
                    @error('longDescr')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror

                    <hr>
                    <label for="category">Select Category Name</label>
                    <select class="custom-select rounded-0" id="category" name="category_id">
                        @foreach ($categorys as $category)
                            <option value="{{ $category->id }}" @if ($category->name == $products->categoryName) selected @endif>
                                {{ $category->name }} </option>
                        @endforeach

                    </select>
                    <hr>
                    <label for="subCategory">Select Sub Category Name</label>
                    <select class="custom-select rounded-0" id="subCategory" name="subCategory_id">
                        @foreach ($subCategorys as $subCategory)
                            <option value="{{ $subCategory->id }}" @if ($subCategory->subCategoryName == $products->subCategoryName) selected @endif>
                                {{ $subCategory->subCategoryName }} </option>
                        @endforeach
                        {{-- <option value="">anas</option> --}}
                    </select>




                </div>
                <!-- /.card-body -->
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Add Product</button>
            </div>
        </form>
    </div>

@endsection
