@extends("admin.layout")

@section("content")
    <h1>{{$title}}</h1>
    <a href="{{route("category.create")}}" class="btn btn-success">Создать</a>
    <hr/>
<div class="container">
    <div class="row">
    @foreach($items as $item)
<div class="col-3">
                <div class="card" style="width: 18rem;margin-bottom: 10px;">

                    <div class="card-body">
                        @
                        <h5 class="card-title">{{$item->title}}</h5>
                        <p class="card-text">{{$item->description}}</p>
                        <p class="cart-text">{{count($item->products)}}</p>
                        <a href="{{route("category.show",['category'=>$item->id])}}" class="btn btn-primary">Перейти</a>
                    </div>
                </div>
</div>
    @endforeach

</div>
    </div>




@endsection












{{--<h1>Categories</h1>--}}
{{--@endsection--}}

{{--@section("content")--}}
{{--@foreach($categories as $category)--}}
{{--    <li> <a href="/admin/category/{{$category->id}}/edit">{{$category->id}} - {{$category->title}}</a></li>--}}
{{--@endforeach--}}

{{--@endsection--}}


{{--action("\App\Http\Controllers\CategoryController@index")--}}
