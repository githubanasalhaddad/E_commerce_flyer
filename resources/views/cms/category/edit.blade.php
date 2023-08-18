@extends('index')
@section('title', 'Edit Category')
@section('smallTitle', 'Edit Category')
@section('content')
    <div class="container">
        <form method="post" action="{{ route('category.update',$categorys->id) }}">
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

                    <label for="name">Category Name</label>
                    <input type="text" name="name" value="{{$categorys->name}}"
                        class="form-control @error('name')is-invalid
                    
                @enderror"
                        id="name" placeholder="Enter Category Name">
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-info">Update</button>
            </div>
        </form>
    </div>

@endsection