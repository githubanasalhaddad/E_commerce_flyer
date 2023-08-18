@extends('index')
@section('title', 'All Sub Category')
@section('smallTitle', 'All Sub Category')
@section('content')
    <div class="container">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    @include('layout.alertDanger')
                    <h3 class="card-title">Show all Sub category</h3>

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
                                <th>Sub Category Name</th>
                                <th>Category</th>
                                <th>Product</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subCategors as $Subcategory)
                                <tr>
                                    <td>{{ $Subcategory->id }}</td>
                                    <td>{{ $Subcategory->subCategoryName }}</td>
                                    <td>{{ $Subcategory->category_name }}</td>
                                    <td>{{ $Subcategory->product_count }}</td>

                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('subCategory.edit', $Subcategory->id) }}"
                                                class="btn btn-info">Edit</a>
                                            <form action="{{ route('subCategory.destroy', $Subcategory->id) }}"
                                                method="post">
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
    </div>

@endsection
