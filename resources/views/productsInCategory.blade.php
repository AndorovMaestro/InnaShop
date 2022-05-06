@extends("layout")

@section("content")
    <div class="container">
        <div class="row">
            @if(count($ShowOneCategory)==0)
                "Нет продуктов"
                @endif
            @include ("DZproduct",["productsSearch"=>$ShowOneCategory])



{{--            @foreach($ShowOneCategory as $ShowOne)--}}
{{--                <h1>{{$ShowOne->title}}</h1>--}}
{{--            @endforeach--}}

        </div>
    </div>
@endsection
