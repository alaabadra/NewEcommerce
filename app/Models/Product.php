<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Discount;
class Product extends Model
{
    public function productAttributes(){
        return $this->hasMany("App\Models\ProductAttribute");
    }
    public function category(){
        return $this->belongsTo("App\Models\Category");
    }
    public function similarProducts(){
        return $this->hasMany("App\Models\SimilarProduct");
    }
    public function ordersProducts(){
        return $this->belongsToMany("App\Models\ProductAttributs",'orders_products','product_id','order_id');
    }
    public function discounts()
    {
        return $this->hasMany('App\Discount');
    }
}
