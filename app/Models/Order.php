<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function similarProducts(){
        return $this->hasMany("App\Models\SimilarProduct");
    }
    public function Couponcodes(){
        return $this->hasMany("App\Models\Couponcode");
    }
    public function productAttrs(){
        return $this->hasMany("App\Models\ProductAttribute");
    }
    public function delivery(){
        return $this->belongsTo("App\Models\Delivery");
    }
    public function user(){
        return $this->belongsTo("App\Models\User");
    }
    public function productsOrders(){
        return $this->belongsToMany("App\Models\ProductAttribute",'order_product_attributes');
    }
    
    public function getOrderStatusAttribute($val){

        return $val==1 ? 'غير متوفر' :' تم التسليم ';
        if($val==2){
            return 'تم التسليم';
        }elseif($val==1){
            return 'تم الشحن';
        }else{
            return 'تم تقييد الطلب';
        }
       }
}
