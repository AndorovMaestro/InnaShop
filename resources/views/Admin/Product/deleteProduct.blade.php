<h1>Вы точно хотите удалить {{$item->title}} ?</h1>

<form action="{{route("products.destroy",['product'=>$item->id])}}" method="post">
    @method("delete")
    @csrf
    <input type="submit" value="Да">
    <a href="{{route("products.show",['product'=>$item->id])}}">Нет</a>
</form>


