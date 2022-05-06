@extends("admin.layout")
@section("content")

    <form action="{{route("products.update",['product'=>$item->id])}}" method="post">
        @method("put")
        @csrf
        <label for="GET-name">Name:</label>
        <input type="text" name="title" value="{{$item->title}}">
        <textarea  name="description" >{{$item->description}}</textarea>
        <select name="category_id">
            @foreach ($categories as $category)
        <option value="{{$category->id}}"
        @if ($item->category && $category->id===$item->category->id)
            selected
            @endif
        >{{$category->title}}</option>

            @endforeach
        </select>
        <input type="submit" value="Save">


    </form>

@endsection



