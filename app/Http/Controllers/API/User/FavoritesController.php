<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    
    public function getUserFavorites(){
         try{
        //     if (auth()->check()){
                // $user=auth()->user();
                // $myFavs= Favorite::where(['user_id'=>$user['id']])->paginate(10);
                $myFavs= Favorite::where(['user_id'=>1])->with('productAttr')->get();
                
                return response()->json([
                    'status'=>200,
                    'message'=>$myFavs
                ]);
        //     }else{
        //         return response()->json([
        //             'status'=>401,
        //             'message'=>'you can not see this page , because you havent auth in this page'
        //         ]);
        //     }
        }catch(\Exception $ex){
            return response()->json([
                'status'=>500,
                'message'=>'There is something wrong, please try again'
            ]);  
        } 
        
    }
    
    public function addProductIntoUserFavorite($product_atrr_id){
         try{
        //     if (auth()->check()){
        //         $user=auth()->user();
                //Favorite::insert(['product_atrr_id'=>$product_atrr_id,'user_id'=>$user['id']]);
                $userReviewCount= Favorite::where(['user_id'=>1,'product_attr_id'=>$product_atrr_id])->count();
                if($userReviewCount==0){
                Favorite::insert(['product_attr_id'=>$product_atrr_id,'user_id'=>1]);
                return response()->json([
                    'status'=>200,
                    'message'=>'added product into your favorite successfully'
                ]);
            }else{
                return response()->json([
                    'status'=>400,
                    'message'=>'you added  this product into your favorite , so now you can not add it again'
                ]);
            }
        //     }else{
        //         return response()->json([
        //             'status'=>401,
        //             'message'=>'you can not see this page , because you havent auth in this page'
        //         ]);
        //     }
        }catch(\Exception $ex){
            return response()->json([
                'status'=>500,
                'message'=>'There is something wrong, please try again'
            ]);  
        } 
        
    }
    
    public function deleteProdFromUserFavourites($fav_id){
        try{
            // if (auth()->check()){
                Favorite::where(['id'=>$fav_id])->first();
                return response()->json([
                    'status'=>200,
                    'message'=>'deleted your favorite successfully'
                ]);
            // }else{
            //     return response()->json([
            //         'status'=>401,
            //         'message'=>'you can not see this page , because you havent auth in this page'
            //     ]);
            // }
        }catch(\Exception $ex){
            return response()->json([
                'status'=>500,
                'message'=>'There is something wrong, please try again'
            ]);  
        } 

    }
}
