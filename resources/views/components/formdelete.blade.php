<form action="{{route('panier.destroy',['panier'=>$id])}}" method="post">
    @csrf
    @method("DELETE")
    <button class="delete" type="submit">
        <i class="fa fa-trash"></i>
    </button>
</form>
