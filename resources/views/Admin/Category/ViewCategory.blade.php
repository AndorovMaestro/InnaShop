@extends("admin.layout")
@section("content")
    <h1> {{$item->title}}   </h1>
    <h2> {{$item->description}}</h2>
    <a href="{{route("category.edit",['category'=>$item->id])}}">Изменить</a>
    <a href="{{route("category.delete",["id"=>$item->id])}}">Delete</a>
@endsection




