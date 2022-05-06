<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;


    public function user(){
        return $this->hasOne(User::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class);
    }
    public function deleteProduct(Product $product){
        return $this->products()->detach($product->id);
    }
}
