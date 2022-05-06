<form action="{{route("products.store")}}" method="post">
    @method("post")
    @csrf
    <label for="GET-name">Name:</label>
    <input type="text" name="title" value="{{old("title")}}">
    <textarea  name="description">{{old("description")}}</textarea>

         <select name="category_id">
        @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->title}}</option>
        @endforeach
    </select>
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
