
@foreach($productsSearch as $productSearch)
    <h1>{{$productSearch->title}}</h1>
    <h2>{{$productSearch->description}}</h2>
    <a href="{{route("addToCart",['product'=>$productSearch->id])}}" class="btn btn-primary">Корзина</a>
@endforeach

