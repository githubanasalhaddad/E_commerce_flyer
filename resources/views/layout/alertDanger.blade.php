@if (session()->has('message'))
    <div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert"
            aria-hidden="true">x</button>
        <h5><i class="icon fas fa-check">Success</i></h5>
        {{ session('message') }}
    </div>
@endif
