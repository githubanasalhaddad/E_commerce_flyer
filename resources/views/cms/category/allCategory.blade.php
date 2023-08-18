@extends('index')
@section('title', 'All Category')
@section('smallTitle', 'All Category')
@section('content')
    <div class="container">
        <div class="col-12">
            <div class="card">
                <div class="card-header">

                    @if (session()->has('message'))
                    <div class="alert alert-danger alert-dismissible"><button type="button" class="close"
                            data-dismiss="alert" aria-hidden="true">x</button>
                        <h5><i class="icon fas fa-check">Success</i></h5>
                        {{ session('message') }}
                    </div>
                @endif

                    <h3 class="card-title">Show all category</h3>

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
                                <th>Category Name</th>
                                <th>SUB Category</th>
                                <th>Products</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categorys as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->subCategoryCount }}</td>
                                    <td>{{ $category->categoryProductCount }}</td>

                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('category.edit', $category->id) }}"
                                                class="btn btn-info">Edit</a>
                                            <form action="{{ route('category.destroy', $category->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button
                                                    class="btn btn-danger @error('delete')is-invalid
                                                    
                                                @enderror"
                                                    name="delete">Delete</button>
                                                @error('delete')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
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
