<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['title','description','category_id'];

public function category(){
    return $this->belongsTo(Category::class);
}
public function imgs(){
    return $this->hasMany(ProductImg::class);
}
public function carts(){
    return $this->belongsToMany(Cart::class);
}
public function addToCart(Cart $cart){
    return $this->carts()->attach($cart->id);
}
}
