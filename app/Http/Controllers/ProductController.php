<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\ProductImg;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
       $products=Product::paginate(3);
       $products->lastPage();
        $pages=$products->getUrlRange(1,$products->lastPage());



           return view ("Admin.Product.products",['items'=>$products,'title'=>'Product_list','pages'=>$pages]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view ("Admin.Product.createProduct",["categories"=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        Product::create($request->all());
        return redirect()->route("products.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
       return view("Admin.Product.ViewProduct",['item'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories= Category::all();
        return view("Admin.Product.edit",['item'=>$product,'categories'=>$categories]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {

        $product->update($request->all());
        return redirect()->route("products.show",['product'=>$product->id])
            ->with("status","Товар " . $product->title . " успешно обнавлен");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route("products.index");
    }
    public function delete($id){
        $product=Product::find($id);
        return view ("Admin.Product.deleteProduct",["item"=>$product]);
    }

    public function upload($id)
    {
     return view("Admin.Product.UploadProductImg",['item'=>$id]);
    }

    public function saveImg(Request $request,$id)
    {
        $request->validate([
            'productImg' => 'required|mimes:jpg|max:2048'
        ]);
        if($request->file()) {
            $fileName = time() . '_' . $request->productImg->getClientOriginalName();
            $filePath = $request->file("productImg")->storeAs('uploads', $fileName, 'public');
            $withStorage = '/storage/' . $filePath;
            ProductImg::create(['path'=>$withStorage,'product_id'=>$id]);
            return redirect()->route("products.index");
        }

    }


}

