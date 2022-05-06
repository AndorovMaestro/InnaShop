<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $categories = Category::all();
      return view ('Admin.Category.categories',['items'=>$categories,'title'=>'Categories list']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ("Admin.Category.createCategory");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        Category::create($request->all());
        return redirect()->route("category.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view("Admin.Category.ViewCategory",['item'=>$category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view("Admin.Category.editCategory",['item'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->all());
        $request->validate([
            'cover' => 'required|mimes:jpg|max:2048'
        ]);
        if($request->file()) {
            $fileName = time().'_'.$request->cover->getClientOriginalName();
            $filePath = $request->file("cover")->storeAs('uploads', $fileName, 'public');
            $withStorage = '/storage/' . $filePath;
            $category->cover=$withStorage;
            $category->save();

        }
        return redirect()->route("category.show",['category'=>$category->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route("category.index");
    }
    public function delete($id){
        $category=Category::find($id);
        return view ("Admin.Category.deleteCategory",["item"=>$category]);
    }


}
