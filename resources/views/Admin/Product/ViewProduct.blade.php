@extends("admin.layout")
@section("content")
<h1> {{$item->title}}   </h1>
<h2> {{$item->description}}</h2>
<h3>@foreach($item->imgs as $img)
    <img src="{{$img->path}}">

    @endforeach

</h3>
<a href="{{route("products.edit",['product'=>$item->id])}}">Изменить</a>
<a href="{{route("products.delete",['id'=>$item->id])}}">Delete</a>
<a href="{{route("products.img.upload",["id"=>$item->id])}}">Upload</a>
@endsection



