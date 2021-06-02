<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    public function order(){
        return $this->belongsTo("App\Models\Order");
    }
    public function cart(){
        return $this->belongsTo("App\Models\Cart");
    }

    public function ordersProducts(){
        return $this->belongsToMany("App\Models\Order",'order_product_attributes');
    }

    public function userProductsAttrs(){
        return $this->belongsToMany("App\Models\User",'products_attrs_user');
    }
    public function couponcodeProductsAttrs(){
        return $this->belongsToMany("App\Models\Couponcode",'couponcodes_products_attributes');
    }
    public function favorites(){
        return $this->hasMany("App\Models\Favorite");
    }
    public function languages(){
        return $this->hasMany("App\Models\Language");
    }
    public function getProductAttrStatusAttribute($val){

        return $val==1 ? 'غير متوفر' :' متوفر ';
       }
}
