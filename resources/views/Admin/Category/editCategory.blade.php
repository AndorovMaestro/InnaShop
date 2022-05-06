@extends("admin.layout")
@section("content")

    <form enctype="multipart/form-data" action="{{route("category.update",['category'=>$item->id])}}" method="post">
        @method("put")
        @csrf
        <img src="{{$item->cover}}">
        <label for="GET-name">Name:</label>
        <input type="file" name="cover"/>
        <input type="text" name="title" value="{{$item->title}}"/>

        <textarea  name="description" >{{$item->description}}</textarea>
        <input type="submit" value="Save"/>

    </form>

@endsection
