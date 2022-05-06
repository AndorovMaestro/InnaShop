@extends("layout")

@section("content")



{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--    @foreach($showCategories as $showCategory)--}}
{{--            <h1>{{$showCategory->title}}</h1>--}}
{{--                <a href="{{route("show.One.Category",['id'=>$showCategory->id])}}" class="btn btn-success">Создать</a>--}}
{{--          <img src="{{$showCategory->cover}}" style="width: 100px;height: 120px">--}}
{{--                <hr/>--}}
{{--            @endforeach--}}
{{--           @foreach($MvpProducts as $MvpProduct)--}}
{{--               <h2>{{$MvpProduct->title}}</h2>--}}
{{--        @endforeach--}}

{{--        </div>--}}
{{--    </div>--}}



    <div class="container">
        <div class="row">
            @foreach($showCategories as $showCategory)
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="{{$showCategory->cover}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$showCategory->title}}</h5>
                        <hr/>
                        <p class="card-text">{{$showCategory->description}}</p>
                        <a href="{{route("show.One.Category",['id'=>$showCategory->id])}}" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection
