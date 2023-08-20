@extends('home.app')
@section('contentHome')
    <br><br>
    <div class="container">
        <h1>Checkout </h1>
        @if (session()->has('massage'))
            <div class="alert alert-success">
                {{ session()->get('massage') }}
            </div>
        @endif
    </div>
@endsection
