<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Electro Shop Website Spelicase de Vendu Tous Les MAtaires Electronique">
        <meta name="theme-color" content="#317EFB"/>
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
        <link rel="canonical" href="http://localhost:8000/product"/>
		<link type="text/css" rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>
		<link type="text/css" rel="stylesheet" href="{{asset('css/slick.css')}}"/>
		<link type="text/css" rel="stylesheet" href="{{asset('css/slick-theme.css')}}"/>
		<link type="text/css" rel="stylesheet" href="{{asset('css/nouislider.min.css')}}"/>
		<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
		<link type="text/css" rel="stylesheet" href="{{asset('css/style.css')}}"/>
        <title>ElectroShop</title>
    </head>
	<body>
		<!-- HEADER -->

		<header>

			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#" name="Company phone"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
						<li><a href="#" name="Company email"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
						<li><a href="#" name="Company adresse"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
					</ul>
					<ul class="header-links pull-right">
						<li><a href="#" name="Dollor"><i class="fa fa-dollar"></i> USD</a></li>
                        @auth
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" name="Logout">
                                <i class="fa fa-user-o"></i>Logout
                            </a>
                        </li>
                        @else
						<li><a href="/login" name="Login"><i class="fa fa-user-o"></i> Login</a></li>
                        @endauth
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="{{url('/')}}" class="logo">
									<img src="{{asset('/img/logo.webp')}}" alt="logo Electro">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form action="{{route('search')}}" method="GET">
									<select class="input-select" name="category">
								    <option value="">All</option>
									@foreach ($categories as $category)
										<option value="{{$category->id}}">{{$category->name}}</option>
									@endforeach
									</select>
									<input type="search" class="input" placeholder="Search here" name="search_query">
									<button class="search-btn">Search</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
                                <!-- Cart -->
                                <div class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                        <i class="fa fa-shopping-cart"></i>
                                        <span>Your Cart</span>
                                        <div class="qty">{{$itemselected}}</div>
                                    </a>
                                    <div class="cart-dropdown">
                                        <div class="cart-list">
                                            @foreach ($listproduit as $produit)
                                            <div class="product-widget">
                                                <div class="product-img">
                                                    @foreach ($produit->pictures as $picture)
                                                    <img src="{{Storage::url($picture->path)}}" alt="">
                                                    @endforeach
                                                </div>
                                                <div class="product-body">
                                                    <h3 class="product-name"><a href="{{route('product.show',['product'=>$produit->slug])}} ">{{$produit->name}}</a></h3>
                                                    <h4 class="product-price"><span class="qty">{{$produit->qte}} x</span>{{$produit->price}} MAD</h4>
                                                </div>
                                                <form action="{{route('panier.destroy',['panier'=>$produit->id])}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="delete" type="submit"><i class="fa fa-close"></i></button>
                                                </form>
                                            </div>

                                            @endforeach
                                        </div>
                                        <div class="cart-summary">
                                            <small>{{$itemselected}} Item(s) selected</small>
                                            <h5>SUBTOTAL: {{$total}} MAD </h5>
                                        </div>
                                        <div class="cart-btns">
                                            <a href="{{route('viewcart.index')}}">View Cart</a>
                                            <a href="{{route('checkout.create')}}">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Cart -->
								<!-- Wishlist -->
                                @auth
                                <div class="dropdown">
                                    <a class="dropdown-toggle" href="/" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-user"></i>
										<span>{{Auth::user()->first_name}}</span>
                                      </a>
                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                          <ul>
                                            <li><a href="" class="dropdown-profile">Profile</a></li>
                                            <li>
                                                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                                class="dropdown-profile">
                                                Logout
                                                </a>
                                            </li>
                                        </ul>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                                @endauth
								<!-- /Wishlist -->


								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active">
                            <a href="{{route('product.index')}}">All</a>
                        </li>
						<li>
                            <a href="#">Hot Deals</a>
                        </li>
                        @foreach ($categories as $category)
                        @isset($key)
						<li class="{{$key=="$category->name"?'active':''}}">
                         @else
                         <li class="">
                        @endisset
                            <a href="{{route('category.show',['category'=>$category->name])}}">
                                {{$category->name}}
                            </a>
                        </li>
                        @endforeach
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->
        @yield('content')
        <x-alert></x-alert>
        <div id="newsletter" class="section">
            <!-- container -->
            <div class="container">
              <!-- row -->
              <div class="row">
                <div class="col-md-12">
                  <div class="newsletter">
                    <p>Sign Up for the <strong>NEWSLETTER</strong></p>
                    <form>
                      <input
                        class="input"
                        type="email"
                        placeholder="Enter Your Email"
                      />
                      <button class="newsletter-btn">
                        <i class="fa fa-envelope"></i> Subscribe
                      </button>
                    </form>
                    <ul class="newsletter-follow">
                      <li>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                      </li>
                      <li>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                      </li>
                      <li>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                      </li>
                      <li>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <!-- /row -->
            </div>
            <!-- /container -->
          </div>
        <footer id="footer">
            <!-- top footer -->
            <div class="section">
              <!-- container -->
              <div class="container">
                <!-- row -->
                <div class="row">
                  <div class="col-md-3 col-xs-6">
                    <div class="footer">
                      <h3 class="footer-title">About Us</h3>
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                        do eiusmod tempor incididunt ut.
                      </p>
                      <ul class="footer-links">
                        <li>
                          <a href="#"
                            ><i class="fa fa-map-marker"></i>1734 Stonecoal Road</a
                          >
                        </li>
                        <li>
                          <a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a>
                        </li>
                        <li>
                          <a href="#"
                            ><i class="fa fa-envelope-o"></i>email@email.com</a
                          >
                        </li>
                      </ul>
                    </div>
                  </div>

                  <div class="col-md-3 col-xs-6">
                    <div class="footer">
                      <h3 class="footer-title">Categories</h3>
                      <ul class="footer-links">
                        <li><a href="#">Hot deals</a></li>
                        <li><a href="#">Laptops</a></li>
                        <li><a href="#">Smartphones</a></li>
                        <li><a href="#">Cameras</a></li>
                        <li><a href="#">Accessories</a></li>
                      </ul>
                    </div>
                  </div>

                  <div class="clearfix visible-xs"></div>

                  <div class="col-md-3 col-xs-6">
                    <div class="footer">
                      <h3 class="footer-title">Information</h3>
                      <ul class="footer-links">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Orders and Returns</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                      </ul>
                    </div>
                  </div>

                  <div class="col-md-3 col-xs-6">
                    <div class="footer">
                      <h3 class="footer-title">Service</h3>
                      <ul class="footer-links">
                        <li><a href="#">My Account</a></li>
                        <li><a href="#">View Cart</a></li>
                        <li><a href="#">Wishlist</a></li>
                        <li><a href="#">Track My Order</a></li>
                        <li><a href="#">Help</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <!-- /row -->
              </div>
              <!-- /container -->
            </div>
            <!-- /top footer -->

            <!-- bottom footer -->
            <div id="bottom-footer" class="section">
              <div class="container">
                <!-- row -->
                <div class="row">
                  <div class="col-md-12 text-center">
                    <ul class="footer-payments">
                      <li>
                        <a href="#"><i class="fa fa-cc-visa"></i></a>
                      </li>
                      <li>
                        <a href="#"><i class="fa fa-credit-card"></i></a>
                      </li>
                      <li>
                        <a href="#"><i class="fa fa-cc-paypal"></i></a>
                      </li>
                      <li>
                        <a href="#"><i class="fa fa-cc-mastercard"></i></a>
                      </li>
                      <li>
                        <a href="#"><i class="fa fa-cc-discover"></i></a>
                      </li>
                      <li>
                        <a href="#"><i class="fa fa-cc-amex"></i></a>
                      </li>
                    </ul>
                    <span class="copyright">
                      All rights reserved | This template is made with
                      <i class="fa fa-heart-o" aria-hidden="true"></i> by Zakaria Mouchtati
                      <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </span>
                  </div>
                </div>
                <!-- /row -->
              </div>
              <!-- /container -->
            </div>
            <!-- /bottom footer -->
          </footer>
		<!-- jQuery Plugins -->
		<script src="{{asset('js/jquery.min.js')}}"></script>
		{{-- <script src="{{asset('js/bootstrap.min.js')}}"></script> --}}
		<script src="{{asset('js/slick.min.js')}}"></script>
		<script src="{{asset('js/nouislider.min.js')}}"></script>
		<script src="{{asset('js/jquery.zoom.min.js')}}"></script>
		<script src="{{asset('js/main.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
	</body>
</html>
