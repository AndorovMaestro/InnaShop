@extends("admin.layout")
@section("content")

    <form enctype="multipart/form-data" action="{{route("products.img.save",['id'=>$item])}}" method="post">
        @method("post")
        @csrf
{{--     <img src="{{$item}}">--}}
        <label for="GET-name">Name:</label>
        <input type="file" name="productImg"/>
{{--        <input type="text" name="title" value="{{$item->title}}"/>--}}

{{--        <textarea  name="description" >{{$item->description}}</textarea>--}}
        <input type="submit" value="Save"/>

    </form>
    @if ($errors->any())
        <hr />
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection
