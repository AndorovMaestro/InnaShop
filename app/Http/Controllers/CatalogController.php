<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class CatalogController extends Controller
{
  public function showCategories(){
      $showCategories=Category::all();
      $MvpProducts=Product::orderBy("updated_at","desc")->take(3)->get();
      return view("welcome",["showCategories"=>$showCategories,"MvpProducts"=>$MvpProducts]);
  }
 public function ShowOneCategory($id){
      $ShowOneCategory=Product::where("category_id",$id)->get();
      return view ("productsInCategory",["ShowOneCategory"=>$ShowOneCategory]);

 }
public function Search(Request $request){
$search1=$request->input("search1");
$productsSearch=Product::where("title","like",$search1."%")->get();
return view ("searchProduct",["productsSearch"=>$productsSearch,"search1"=>$search1]);

}

    public function addToCart(Product $product){

        $cart=Auth::user()->cart;
        if (!$cart){
            $newCart=new Cart();
            $newCart->user_id=Auth::user()->id;
            $newCart->save();
            $cart=$newCart;
        }
        $product->addToCart($cart);
        return back()->with("status","Товар " . $product->title . " успешно добавлен в корзину");
    }

    public function showCart(){
        $cart=Auth::user()->cart;
        $products=$cart->products()->paginate (3);
//        $products=Product::where("cart_id",$cart->id)->paginate (3);

        $pages=$products->getUrlRange(1,$products->lastPage());

        return view("cart",["products"=>$products,"pages"=>$pages]);
    }
public function showOrder(){
      return view("order");
}
    public function saveOrder(StoreOrderRequest $request)
    {
        $Order=new Order();
        $Order->phone_number=$request->get("phone_number");
        $Order->address=$request->get("address");
        $Order->user_id=Auth::user()->id;
        $cart=Auth::user()->cart;
        foreach ($cart->products as $userProduct){
         $Order->attachProduct($userProduct);
         $cart->deleteProduct($userProduct);    
        }
        

        $Order->save();
        return redirect()->route("showCart");
    }
}





