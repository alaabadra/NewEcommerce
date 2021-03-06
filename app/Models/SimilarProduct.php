<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SimilarProduct extends Model
{
    public function order(){
        return $this->belongsTo("App\Models\Order");
    }
    public function product(){
        return $this->belongsTo("App\Models\Product");
    }
    public function languages(){
        return $this->hasMany("App\Models\Language");

    }
}
