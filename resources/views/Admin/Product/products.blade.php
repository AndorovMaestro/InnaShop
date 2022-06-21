
@extends("admin.layout")
@section('content')

    <h1>{{$title}}</h1>
<div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach($items as $item)
        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

            <div class="card-body">
                @if($item->category)
                <h4 class="card-title">{{$item->category->title}}</h4>
                            @endif
                            <h5 class="card-title">{{$item->title}}</h5>
                            <p class="card-text">{{$item->description}}</p>
            
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="{{route("products.show",['product'=>$item->id])}}" class="btn btn-sm btn-outline-primary">Посмотреть</a>
                  <a href="{{route("products.edit",['product'=>$item->id])}}" class="btn btn-sm btn-outline-secondary">Изменить</a>
                </div>
                <small class="text-muted">Изменено: {{$item->updated_at}}</small>
              </div>
            </div>
          </div>
        </div>
        @endforeach
    </div>
  </div>
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