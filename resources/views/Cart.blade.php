

@extends("layout")

@section("content")

    <div class="container">
        <div class="row">
            @foreach($products as $product)
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="{{$product->cover}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$product->title}}</h5>
                            <hr/>
                            <p class="card-text">{{$product->description}}</p>

                        </div>
                    </div>
                </div>
            @endforeach
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        @foreach($pages as $pageNumber=>$pageUrl)
                            <li class="page-item"><a class="page-link" href="{{$pageUrl}}">{{$pageNumber}}</a></li>
                        @endforeach
                    </ul>
                </nav>
        </div>
    </div>
    <a href="{{route("order")}}" class="btn btn-primary">Купить</a>
@endsection
