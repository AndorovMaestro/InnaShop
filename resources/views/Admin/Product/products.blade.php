@extends("admin.layout")
@section('content')

    <h1>{{$title}}</h1>
    <a href="{{route("products.create")}}" class="btn btn-success">Создать</a>
    <hr/>
    <div class="container">
        <div class="row">

@foreach($items as $item)
                <div class="col-3">
                    <div class="card" style="width: 18rem;margin-bottom: 10px;">

                        <div class="card-body">
                            @if($item->category)
                            <h4 class="card-title">{{$item->category->title}}</h4>
                            @endif
                            <h5 class="card-title">{{$item->title}}</h5>
                            <p class="card-text">{{$item->description}}</p>
                            <a href="{{route("products.show",['product'=>$item->id])}}" class="btn btn-primary">Перейти</a>
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
@endsection



