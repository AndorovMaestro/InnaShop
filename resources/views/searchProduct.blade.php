@extends("layout")
@section("content")
    @include("searchField",["search2"=>$search1])
    @include("DZproduct",["productsSearch"=>$productsSearch])
@endsection
