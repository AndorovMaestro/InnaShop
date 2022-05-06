<h1>Вы точно хотите удалить {{$item->title}} ?</h1>
<hr/>

<form action="{{route("category.destroy",['category'=>$item->id])}}" method="post">
    @method("delete")
    @csrf
    <input type="submit" value="Да">
    <a href="{{route("category.show",['category'=>$item->id])}}">Нет</a>
</form>


