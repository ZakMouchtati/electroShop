<div class="product">
    <div class="product-img">
        @foreach ($path as $pictures)
        <img src="{{Storage::url($pictures->path)}}" alt="{{$name}}" />
        @endforeach
    </div>
    <div class="product-body">
      <p class="product-category">{{$category}}</p>
      <h3 class="product-name">
        <a href="{{route('product.show',['product'=>$slug])}}">{{$name}}</a>
      </h3>
      <h4 class="product-price">
        {{$price}} MAD
      </h4>
      <div class="product-rating">
        @for ($i = 0; $i < $rating ; $i++)
        <i class="fa fa-star"></i>
        @endfor
        @for ($i = 0; $i < 5-$rating ; $i++)
        <i class="fa fa-star-o"></i>
        @endfor
      </div>
      <div class="product-btns">
        <button class="add-to-wishlist">
          <i class="fa fa-heart-o"></i
          ><span class="tooltipp">add to wishlist</span>
        </button>
        <a class="quick-view" href="{{route('product.show',['product'=>$slug])}}" >
          <i class="fa fa-eye"></i>
          </a>
      </div>
    </div>
    <div class="add-to-cart">
        <form action="{{route('panier.store')}}" method="post">
            @csrf
            <input type="hidden" value="{{$id}}" name="id">
            <input type="hidden" value="{{$slug}}" name="slug">
            <input type="hidden" value="1" name="qte">
            <button class="add-to-cart-btn">
              <i class="fa fa-shopping-cart"></i> add to cart
            </button>
        </form>
    </div>
  </div>
