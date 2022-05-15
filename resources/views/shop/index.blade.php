@extends('app.layouts')
@section('content')
<div class="section">
    <!-- container -->
    <div class="container">
      <!-- row -->
      <div class="row">
        <!-- section title -->
        <div class="col-md-12">
          <div class="section-title">
            <h3 class="title">New Products</h3>
          </div>
        </div>
       <div class="col-md-12">
            <div class="row">
              <div class="products-tabs">
                <!-- tab -->
                <div id="tab1" class="tab-pane active">
                  <div class="products-slick" data-nav="#slick-nav-1">
                      @foreach ($new_product as $product)
                      <x-product :id="$product->id" :slug="$product->slug" :path="$product->pictures" :category="$product->category->name" :price="$product->price" :name="$product->name" :rating="number_format($product->comments_avg_rating)"></x-product>
                      @endforeach
                  </div>
                </div>
                <!-- /tab -->
              </div>
            </div>
          </div>
      </div>
      <!-- /row -->
    </div>
    <!-- /container -->
  </div>
  <!-- /SECTION -->
  <div id="hot-deal" class="section">
    <!-- container -->
    <div class="container">
      <!-- row -->
      <div class="row">
        <div class="col-md-12">
          <div class="hot-deal">
            <ul class="hot-deal-countdown">
              <li>
                <div>
                  <h3>02</h3>
                  <span>Days</span>
                </div>
              </li>
              <li>
                <div>
                  <h3>10</h3>
                  <span>Hours</span>
                </div>
              </li>
              <li>
                <div>
                  <h3>34</h3>
                  <span>Mins</span>
                </div>
              </li>
              <li>
                <div>
                  <h3>60</h3>
                  <span>Secs</span>
                </div>
              </li>
            </ul>
            <h2 class="text-uppercase">hot deal this week</h2>
            <p>New Collection Up to 50% OFF</p>
            <a class="primary-btn cta-btn" href="#">Shop now</a>
          </div>
        </div>
      </div>
      <!-- /row -->
    </div>
    <!-- /container -->
  </div>
  <div class="container">
    <!-- row -->
    <div class="row">
      <!-- section title -->
      <div class="col-md-12">
        <div class="section-title">
          <h3 class="title">TOP SELLING</h3>
        </div>
      </div>
     <div class="col-md-12">
          <div class="row">
            <div class="products-tabs">
              <!-- tab -->
              <div id="tab1" class="tab-pane active">
                <div class="products-slick" data-nav="#slick-nav-1">
                    @foreach ($top_selling as $product)
                    <x-product :id="$product->id" :slug="$product->slug" :path="$product->pictures" :category="$product->category->name" :price="$product->price" :name="$product->name" :rating="number_format($product->comments_avg_rating)"></x-product>
                    @endforeach
                </div>
              </div>
              <!-- /tab -->
            </div>
          </div>
        </div>
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
@endsection
