@extends('app.layouts')
@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li><a href="/">Home</a></li>
                    <li><a href="#">All Categories</a></li>
                    <li>
                        <a href="{{route('category.show',['category'=>$product->category->name])}}">
                            {{$product->category->name}}
                        </a>
                    </li>
                    <li class="active">
                        <a href="{{route('product.show',['product'=>$product->slug])}}">
                            {{$product->name}}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- Product main img -->
            <div class="col-md-5 col-md-push-2">
                <div id="product-main-img">
                    @foreach ($product->pictures as $picture)
                    <div class="product-preview">
                        <img src="{{Storage::url($picture->path)}}" alt="">
                    </div>
                    @endforeach
                    <div class="product-preview">
                        <img src="../img/product03.png" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="../img/product06.png" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="../img/product08.png" alt="">
                    </div>
                </div>
            </div>
            <!-- /Product main img -->

            <!-- Product thumb imgs -->
            <div class="col-md-2  col-md-pull-5">
                <div id="product-imgs">
                    @foreach ($product->pictures as $picture)
                    <div class="product-preview">
                        <img src="{{Storage::url($picture->path)}}" alt="">
                    </div>
                    @endforeach
                    <div class="product-preview">
                        <img src="../img/product03.png" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="../img/product06.png" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="../img/product08.png" alt="">
                    </div>
                </div>
            </div>
            <!-- /Product thumb imgs -->

            <!-- Product details -->
            <div class="col-md-5">
                <div class="product-details">
                    <h2 class="product-name">{{$product->name}}</h2>
                    <div>
                        <a class="review-link" href="#"> {{$product->comments_count}} Review(s) | Add your review</a>
                    </div>
                    <div>
                        <h3 class="product-price">{{$product->price}} </h3>
                        @if ($product->stock_quantity)
                        <span class="product-available">In Stock</span>
                        @else
                        <span class="product-available">Invalide</span>
                        @endif
                    </div>
                    <div class="product-options">
                        <label>
                            Color
                            <select class="input-select">
                                <option value="0">Red</option>
                            </select>
                        </label>
                    </div>
                    <form action="{{route('panier.store')}}" method="POST">
                        @csrf
                        <div class="add-to-cart">
                            <div class="qty-label">
                                Qty
                                <div class="input-number">
                                    <input type="hidden" value="{{$product->id}}" name="id">
                                    <input type="hidden" value="{{$product->slug}}" name="slug">
                                    <input type="number" value="1" name="qte">
                                    <span class="qty-up">+</span>
                                    <span class="qty-down">-</span>
                                </div>
                            </div>
                            <button class="add-to-cart-btn" type="submit"><i class="fa fa-shopping-cart"></i> add to cart</button>
                        </div>
                    </form>

                    <ul class="product-btns">
                        <li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
                    </ul>

                    <ul class="product-links">
                        <li>Category:</li>
                        <li><a href="#">{{$product->category->name}}</a></li>
                    </ul>

                    <ul class="product-links">
                        <li>Share:</li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                    </ul>

                </div>
            </div>
            <!-- /Product details -->

            <!-- Product tab -->
            <div class="col-md-12">
                <div id="product-tab">
                    <!-- product tab nav -->
                    <ul class="tab-nav">
                        <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
                        <li><a data-toggle="tab" href="#tab3">Reviews {{$product->comments_count}} </a></li>
                    </ul>
                    <!-- /product tab nav -->

                    <!-- product tab content -->
                    <div class="tab-content">
                        <!-- tab1  -->
                        <div id="tab1" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>{{$product->description}}</p>
                                </div>
                            </div>
                        </div>
                        <!-- /tab1  -->
                        <!-- tab3  -->
                        <div id="tab3" class="tab-pane fade in">
                            <div class="row">
                                <!-- Rating -->
                                <div class="col-md-3">
                                    <div id="rating">
                                        <div class="rating-avg">
                                            <span>{{number_format($product->comments_avg_rating)}}</span>
                                            <div class="rating-stars">
                                                @for ($i = 0; $i < number_format($product->comments_avg_rating) ; $i++)
                                                <i class="fa fa-star"></i>
                                                @endfor
                                                @for ($i = 0; $i < 5-number_format($product->comments_avg_rating) ; $i++)
                                                <i class="fa fa-star-o"></i>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Rating -->

                                <!-- Reviews -->
                                <div class="col-md-6">
                                    <div id="reviews">
                                        <ul class="reviews">
                                            @foreach ($product->comments as $comment)
                                            <li>
                                                <div class="review-heading">
                                                    <h5 class="name">{{$comment->user->first_name}}</h5>
                                                    <p class="date">{{$comment->created_at->diffForHumans()}}</p>
                                                    <div class="review-rating">
                                                        @for ($i = 0; $i < $comment->rating ; $i++)
                                                        <i class="fa fa-star"></i>
                                                        @endfor
                                                        @for ($i = 0; $i < 5-$comment->rating ; $i++)
									                    <i class="fa fa-star-o"></i>
                                                        @endfor
                                                    </div>
                                                </div>
                                                <div class="review-body">
                                                    <p>{{$comment->content}} </p>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <!-- /Reviews -->

                                <!-- Review Form -->
                                <div class="col-md-3">
                                    <div id="review-form">
                                        <form action="{{route('comments.store')}}" method="POST" class="review-form">
                                            @csrf
                                            <input type="hidden" name="product" value="{{$product->id}}">
                                            <textarea class="input" placeholder="Your Review" name="content"></textarea>
                                            <div class="input-rating">
                                                <span>Your Rating: </span>
                                                <div class="stars">
                                                    <input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
                                                    <input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
                                                    <input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
                                                    <input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
                                                    <input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
                                                </div>
                                            </div>
                                            <button class="primary-btn">Submit</button>
                                        </form>
                                    </div>
                                </div>
                                <!-- /Review Form -->
                            </div>
                        </div>
                        <!-- /tab3  -->
                    </div>
                    <!-- /product tab content  -->
                </div>
            </div>
            <!-- /product tab -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- Section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-md-12">
                <div class="section-title text-center">
                    <h3 class="title">Related Products</h3>
                </div>
            </div>

            <!-- product -->
            @foreach ($related_products as $product)
            <div class="col-md-3 col-xs-6">
                <x-product :id="$product->id" :slug="$product->slug" :path="$product->pictures" :category="$product->category->name" :price="$product->price" :name="$product->name" :rating="number_format($product->comments_avg_rating)"></x-product>
            </div>
            @endforeach
            <!-- /product -->
            <div class="clearfix visible-sm visible-xs"></div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /Section -->

@endsection
