<form action="{{route("category.store")}}" method="post">
    @method("post")
    @csrf
    <label for="GET-name">Name:</label>
    <input type="text" name="title" value="">
    <textarea  name="description" ></textarea>
    <input type="submit" value="Save">

</form>
@if ($errors->any())
    <hr />
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

