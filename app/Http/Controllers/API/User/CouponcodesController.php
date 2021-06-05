<?php

namespace App\Http\Controllers\API\User;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Couponcode;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;
use DB; 

class CouponcodesController extends Controller
{    
    public function applyCouponcodesProduct($couponcode_id){
        try{
            $Couponcodesproduct=Couponcode::find($couponcode_id)->productsAttrsCouponcode()->get();
                return response()->json([
                    'status'=>200,
                    'data'=>$Couponcodesproduct
                ]);
        }catch(\Exception $ex){
            return response()->json([
                'status'=>500,
                'data'=>'There is something wrong, please try again'
            ]);  
        }

      }
      public function getCouponcodes(){
        try{
            $Couponcodes=Couponcode::get();
                return response()->json([
                    'status'=>200,
                    'data'=>$Couponcodes
                ]);
        }catch(\Exception $ex){
            return response()->json([
                'status'=>500,
                'data'=>'There is something wrong, please try again'
            ]);  
        }
      }
      public function showCouponcode($id){
        try{
            $Couponcode=Couponcode::where(['id'=>$id])->first();
                return response()->json([
                    'status'=>200,
                    'data'=>$Couponcode
                ]);
        }catch(\Exception $ex){
            return response()->json([
                'status'=>500,
                'data'=>'There is something wrong, please try again'
            ]);  
        }
      }
}