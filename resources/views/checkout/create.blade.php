@extends('app.layouts')
@section('content')
<style>
    .error{
        border-color:#d10024;
    }
</style>
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <h3 class="breadcrumb-header">Checkout</h3>
                <ul class="breadcrumb-tree">
                    <li><a href="#">Home</a></li>
                    <li class="active">Checkout</li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<form action="{{route('commande.store')}} " method="POST">
    @csrf
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-md-7">
                <!-- Billing Details -->
                <div class="billing-details">
                    <div class="section-title">
                        <h3 class="title">Billing address</h3>
                    </div>
                    <div class="form-group">
                        <label for="" class="title">First Name </label>
                        <input class="input @error('first_name') error @enderror" type="text" name="first_name" value="{{old('first_name',Auth::user()->first_name??'')}}"  {{Auth::check()?'readonly':''}} >
                        @error('first_name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="title">Last Name </label>
                        <input class="input @error('last_name') error @enderror" type="text" name="last_name" value="{{old('last_name',Auth::user()->last_name??'')}}"  {{Auth::check()?'readonly':''}}>
                        @error('last_name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="title">Email Name </label>
                        <input class="input @error('email') error @enderror" type="email" name="email" value="{{old('email',Auth::user()->email??'')}}" {{Auth::check()?'readonly':''}}>
                        @error('email')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="title">Adresse</label>
                        <input class="input @error('adresse') error @enderror" type="text" name="adresse" value="{{old('adresse',Auth::user()->adresse??'')}}" {{Auth::check()?'readonly':''}}>
                        @error('adresse')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="title">Tel </label>
                        <input class="input @error('phone') error @enderror" type="tel" name="phone" value="{{old('phone',Auth::user()->phone??'')}}" {{Auth::check()?'readonly':''}}>
                        @error('phone')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    @guest
                    <div class="form-group">
                        <div class="input-checkbox">
                            <input type="checkbox" id="create-account" name="guest">
                            <label for="create-account">
                                <span></span>
                                if you don't have account please register !
                            </label>
                            <div class="caption">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                                <div class="form-group">
                                    <input class="input @error('password') error @enderror" type="password" name="password" placeholder="Enter Your Password">
                                        @error('password')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <input class="input" type="password" name="password_confirmation" placeholder="Enter Your Confirmation Password">
                                    @error('password_confirmation')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    @endguest
                </div>
                <!-- /Billing Details -->
            </div>

            <!-- Order Details -->
            <div class="col-md-5 order-details">
                <div class="section-title text-center">
                    <h3 class="title">Your Order</h3>
                </div>
                <div class="order-summary">
                    <div class="order-col">
                        <div><strong>PRODUCT</strong></div>
                        <div><strong>TOTAL</strong></div>
                    </div>
                    <div class="order-products">
                        @foreach ($listproduit as $item)
                        <div class="order-col">
                            <div> {{$item->qte}} x {{$item->name}}</div>
                            <div>{{$item->price}} MAD</div>
                        </div>
                        @endforeach
                    </div>
                    <div class="order-col">
                        <div>Shiping</div>
                        <div><strong>FREE</strong></div>
                    </div>
                    <div class="order-col">
                        <div><strong>TOTAL</strong></div>
                        <div><strong class="order-total">{{$total}} MAD</strong></div>
                    </div>
                </div>
                <div class="payment-method">
                    <div class="input-radio">
                        <input type="radio" name="payment" value="creditcard" id="payment-1">
                        <label for="payment-1">
                            <span></span>
                            Credit Card
                        </label>
                        <div class="caption">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                    <div class="input-radio">
                        <input type="radio" name="payment" value="Cash" id="payment-2">
                        <label for="payment-2">
                            <span></span>
                            Cash On Delivery
                        </label>
                        <div class="caption">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                    <div class="input-radio">
                        <input type="radio" name="payment" value="paypal" id="payment-3">
                        <label for="payment-3">
                            <span></span>
                            Paypal System
                        </label>
                        <div class="caption">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                    @error('payment')
                    <span class="text-danger">
                        {{$message}}
                    </span>
                    @enderror
                </div>
                <button type="submit" class="primary-btn order-submit">Place order</button>
            </div>
            <!-- /Order Details -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
</form>

@endsection
