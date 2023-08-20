@extends('home.app')
@section('contentHome')
    <br><br>
    <div class="container">
        <div class="col-12">
            <div class="box_main">
                <form action="{{route('AddShippingAddress')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" id="phone_number"
                            class="form-control @error('phone_number')is-invalid
                            
                        @enderror"
                            name="phone_number" placeholder="Enter phone number">
                        @error('phone_number')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror

                    </div>
                    <div
                        class="form-group @error('phone_number')is-invalid
                            
                    @enderror">
                        <label for="city_name">City Name</label>
                        <input type="text" id="city_name" class="form-control" name="city_name" placeholder="Enter city">
                        @error('city_name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="postal_code">Postal Name</label>
                        <input type="text" id="postal_code"
                            class="form-control @error('phone_number')is-invalid
                            
                        @enderror"
                            name="postal_code" placeholder="Enter your Postal name">
                        @error('postal_code')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>


                    <input type="submit" name="submit" id="submit" class="btn btn-info" value="Next">
                </form>
            </div>
        </div>
    </div>
    <br><b></b>
@endsection
