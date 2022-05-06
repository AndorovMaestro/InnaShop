<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Product;

class Order extends Model

{
    use HasFactory;
    protected $fillable = ["phone_number","address"];

public function products(){
    return $this->belongsToMany(Product::class);
}

public function attachProduct(Product $product){
    return $this->products()->attach($product->id);
}

}
