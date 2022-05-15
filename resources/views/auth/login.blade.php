@extends('app.layouts')

@section('content')
<div class="container" id="breadcrumb">
    <div class="row mt-5">
        <div class="col-md-6">
			<img class="img-fluid" src="img/login.jpg" alt="">
        </div>
        <div class="col-md-6" style="margin-top: 50px">
            <h3 class='title my-5'>LOG IN TO ENTER</h3>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group col-md-12">
                  <label for="email">Email :</label>
                  <input type="text" class="input" name="email" id="email" value="{{old('email')}}">
                  @error('email')
                  <span class="invalid-feedback text-danger" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                 @enderror
                </div>
                <div class="form-group col-md-12">
                    <label for="password">Password :</label>
                    <input type="password" class="input"  name="password" id="password">
                </div>
                <div class="col-md-12 mx-auto">
                    <button type="submit" class="btn-block primary-btn">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
