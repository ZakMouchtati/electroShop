@extends('app.layouts')
@section('content')
<div class="container">
    <div class="text-center">
        <div class="msg col-8">
            <strong>Thanks Your Order Has Submited Success ! </strong>
            <p>Merci de Verfier Votre Boite Mail </p>
            <a href="{{route('product.index')}}" class="primary-btn order-submit">Back To Shop </a>
        </div>
    </div>
</div>
@endsection
