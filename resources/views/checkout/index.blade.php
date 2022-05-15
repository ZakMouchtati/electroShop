@extends('app.layouts')
@section('content')
<style>
    table td .item-price,.soustotal{
        border: none;
    }
</style>
<div class="container">
        <table class="table">
        <thead>
            <tr>
                <th>Image Produit</th>
                <th>Nom Produit</th>
                <th>Prix</th>
                <th>Qte</th>
                <th>Sous Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listproduit as $item)
            <tr>
            <td>
                <div class="img">
                    @foreach ($item->pictures as $picture)
                    <img src="{{Storage::url($picture->path)}}" alt="" class="img-thumbnail">
                    @endforeach
                </div>
            </td>
            <td>
                <a href="{{route('product.show',['product'=>$item->slug])}} ">{{$item->name}}</a>
            </td>
            <td>
               <span class="item-price">
                   {{$item->price}}
                </span>
                    MAD
            </td>
            <td>
                <div class="qte-number">
                    <span class="qty-down">-</span>
                        @csrf
                        <input type="hidden" value="{{$item->id}}">
                        <input type="text" value="{{$item->qte}}" name="qte" class="qte">
                        <span class="qty-up">+</span>
                    </div>
            </td>
            <td>
               <span class="soustotal">{{$item->qte*$item->price}}</span>
                   MAD
            </td>
            <td>
                <form action="{{route('panier.destroy',['panier'=>$item->id])}}" method="post">
                    @csrf
                    @method("DELETE")
                    <button class="delete" type="submit">
                        <i class="fa fa-trash"></i>
                    </button>
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="order-summary col-md-6 total">
    <div class="order-col">
        <div><strong>TOTAL</strong></div>
        <div>
            <strong class="order-total">
                <span id="total-price">
                    {{$total}}
                </span>
                MAD
        </strong>
    </div>
    </div>
    <a href="{{route('checkout.create')}}" class="primary-btn order-submit btn-block">Commander Mainetemt</a >
</div>
</div>
@endsection
