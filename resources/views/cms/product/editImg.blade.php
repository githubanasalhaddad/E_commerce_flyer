@extends('index')
@section('title', 'Edit Img Product')
@section('smallTitle', 'Edit Img Product')
@section('content')
    <div class="container">
        <form method="post" action="{{ route('updateImgProduct',$products->id) }}" enctype="multipart/form-data">
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

                    <input type="hidden" name="id" value="{{$products->id}}">

                    <div>
                        <label for="formFileLg" class="form-label">PROVIOUS IMAGE</label>
                        <div class="col-sm-10">
                            <img src="{{ asset($products->img) }}" alt="">
                        </div>
                    </div>


                    <div>
                        <label for="formFileLg" class="form-label">Uplode New imge</label>
                        <input
                            class="form-control form-control-lg  @error('img')is-invalid
                    
                        @enderror"
                            name="img" id="formFileLg" type="file">

                    </div>


                </div>
                <!-- /.card-body -->
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Update Image</button>
            </div>
        </form>
    </div>

@endsection
