@extends('index')
@section('title', 'Add Sub Category')
@section('smallTitle', 'Add Sub Category')
@section('content')
    <div class="container">
        <form method="post" action="{{ route('subCategory.update',$subCategors->id) }}">
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

                    <label for="name">Sub Category Name</label>
                    <input type="text" name="name" value="{{$subCategors->subCategoryName}}"
                        class="form-control @error('name')is-invalid
                    
                @enderror"
                        id="name" placeholder="Enter Category Name">
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror


                    <label for="name">Select Category Name</label>
                    <select class="custom-select rounded-0" id="category_id" name="category_id">
                        @foreach ($categotys as $category)
                            <option  value="{{ $category->id }}" @if ( $category->name == $subCategors->category_name ) selected   
                            @endif >{{ $category->name }}</option>
                        @endforeach




                    </select>

                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-info">Save</button>
            </div>
        </form>
    </div>

@endsection
