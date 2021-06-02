<?php

namespace App\Http\Controllers\API\User;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;
use DB; 
class CartsController extends Controller
{
    public function getUserCart(){
        // try{
        //     if (auth()->check()){
                // $user=auth()->user();
                $sessionCartInfo=session()->get('cartInfo');

                // $myCart= Cart::where(['user_id'=>$user['id']])->first();//get cart this user
                return response()->json([
                    'status'=>200,
                    'message'=>$sessionCartInfo
                ]);
        //     }else{
        //         return response()->json([
        //             'status'=>200,
        //             'message'=>'you can not see this page , because you havent auth in this page'
        //         ]);
        //     }
        // }catch(\Exception $ex){
        //     return response()->json([
        //         'status'=>500,
        //         'message'=>'There is something wrong, please try again'
        //     ]);  
        // } 
    }
    
    public function addToCartUser(Request $request,$product_atrr_id){
      // try{    
            // if (auth()->check()){
            //     $user=auth()->user();
            $product_atrr_InfoCount=  ProductAttribute::where(['id'=>$product_atrr_id])->count();
                if($product_atrr_InfoCount!==0){

                    $productAttrUserInfoCount= DB::table('products_attrs_user')->where(['user_id'=>1,'product_attribute_id'=>$product_atrr_id])->count();
                     if($productAttrUserInfoCount!==0){//check if this product for this user already
                         //if yes
                                             
                       $product_atrr_Info=  ProductAttribute::where(['id'=>$product_atrr_id])->first();
                       if($request->quantityProductInCartUser!=0){//check if quantity put it not equal  0
                        if($product_atrr_Info->product_attr_quantity>$request->quantityProductInCartUser||$product_atrr_Info->product_attr_quantity==$request->quantityProductInCartUser){//check if quantity that from request less than the quantity that in the store
                         //if yes
                         //will increase the quantity for this product for this user cart(will make update easily)
                         ProductAttribute::where(['id'=>$product_atrr_id])->update(['product_attr_quantity'=>$product_atrr_Info->product_attr_quantity-$request->quantityProductInCartUser]);//will decrease quantity this product from store which quantity that from request(product in cart)
                         $product_atrr_InfoInCartUser=  DB::table('products_attrs_user')->where(['product_attribute_id'=>$product_atrr_id,'user_id'=>1])->first();
                          
                         DB::table('products_attrs_user')->where(['product_attribute_id'=>$product_atrr_id,'user_id'=>1])->update(['product_attr_quantity'=>$product_atrr_InfoInCartUser->product_attr_quantity+$request->quantityProductInCartUser]);//increas quantity product in cart user which quantity that from request(product in cart) 
                           return response()->json([
                             'status'=>200,
                             'message'=>'this product is exist already in this cart , So updated quantity this product in  cart user successfully'
                         ]);
                         }else{
                           //if no
                           return response()->json([
                             'status'=>404,
                             'message'=>'sorry, not exist this quantity in the store for this product'
                         ]);
                       }
                    }else{
                        //if no
                        return response()->json([
                          'status'=>404,
                          'message'=>'sorry, you cannt put quantity = 0 if you want put it = 0 , you can delete this product from your cart '
                      ]);
                    }
                     }else{

                         //if not exist this product in cart this user
                       if($request->quantityProductInCartUser!=0){//check if quantity put it not equal  0
                       $product_atrr_Info=  ProductAttribute::where(['id'=>$product_atrr_id])->first();
                       if($product_atrr_Info->product_attr_quantity>$request->quantityProductInCartUser||$product_atrr_Info->product_attr_quantity==$request->quantityProductInCartUser){//check if quantity that from request less than the quantity that in the store
                         //if yes

                         //will decrease quantity this product from store which quatity that taked from store into cart user
                         ProductAttribute::where(['id'=>$product_atrr_id])->update(['product_attr_quantity'=>$product_atrr_Info->product_attr_quantity-$request->quantityProductInCartUser]);//increas quantity product in cart user which quantity that from request(product in cart) 
                         //will add this product in cart this user with the quantity that from request (will make insert easily)
                         DB::table('products_attrs_user')->insert(['product_attribute_id'=>$product_atrr_id,'user_id'=>1,'product_attr_quantity'=>$request->quantityProductInCartUser]);
                        
                         return response()->json([
                             'status'=>200,
                             'message'=>'add this product into your cart successfully'
                         ]); 
                     }else{
                           //if no
                           return response()->json([
                             'status'=>404,
                             'message'=>'sorry, not exist this quantity in the store for this product'
                         ]);
                       }
                    }else{
                        //if no
                        return response()->json([
                          'status'=>404,
                          'message'=>'sorry, you cannt put quantity = 0 if you want put it = 0 , you can delete this product from your cart '
                      ]);
                    }



     
                     }
                }else{
                    return response()->json([
                        'status'=>404,
                        'message'=>'this product not exist in the store'
                    ]);
                }

            // }else{
            //     return response()->json([
            //         'status'=>401,
            //         'message'=>'you can not see this page , because you havent auth in this page'
            //     ]);
            // }
        // }catch(\Exception $ex){
        //     return response()->json([
        //         'status'=>500,
        //         'message'=>'There is something wrong, please try again'
        //     ]);  
        // } 
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateCartUserIncreaseQuantityProd(Request $request, $product_atrr_id)
    {//edit the product in 
        try{
        //     if (auth()->check()){
        //         $user=auth()->user();
                $data=$request->all();
                // DB::table('products_attrs_user')->where(['product_attribute_id'=>$product_atrr_id,'user_id'=>$user->id])->count();

                $products_attrs_userCount=  DB::table('products_attrs_user')->where(['product_attribute_id'=>$product_atrr_id,'user_id'=>1])->count();
                if($products_attrs_userCount!==0){// check if this product for this user already to update on it if its exist

                    //if yes 
                if($request->quantityProductInCartUser!=0){//check if quantity put it not equal  0

                  $product_atrr_Info=  ProductAttribute::where(['id'=>$product_atrr_id])->first();
                  if($product_atrr_Info->product_attr_quantity>$request->quantityProductInCartUser||$product_atrr_Info->product_attr_quantity==$request->quantityProductInCartUser){//check if quantity that from request less than the quantity that in the store
                    //if yes
                    //decrease this quantity for this product in the store
                    ProductAttribute::where(['id'=>$product_atrr_id])->update(['product_attr_quantity'=>$product_atrr_Info->product_attr_quantity-$request->quantityProductInCartUser]);
                    
                    //will increase the quantity for this product for this user cart(will make update easily)
                    $productAttrUserInfo= DB::table('products_attrs_user')->where(['product_attribute_id'=>$product_atrr_id,'user_id'=>1])->first();
                      DB::table('products_attrs_user')->where(['product_attribute_id'=>$product_atrr_id])->update(['product_attr_quantity'=>$productAttrUserInfo->product_attr_quantity+$request->quantityProductInCartUser]);
                      return response()->json([
                        'status'=>200,
                        'message'=>'this product is exist already in this cart , So updated quantity this product in  cart user successfully'
                    ]);
                    }else{
                      //if no
                      return response()->json([
                        'status'=>404,
                        'message'=>'sorry, not exist this quantity in the store for this product'
                    ]);
                  }


                }else{
                      //if no
                      return response()->json([
                        'status'=>404,
                        'message'=>'sorry, you cannt put quantity = 0 if you want put it = 0 , you can delete this product from your cart '
                    ]);
                }
            }else{
                //if no
                return response()->json([
                    'status'=>404,
                    'message'=>'this product not exist in cart this user'
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
    public function updateCartUserDecreaseQuantityProd(Request $request, $product_atrr_id)
    {//edit the product in 
       // try{
        //     if (auth()->check()){
        //         $user=auth()->user();
                $data=$request->all();



                
                $products_attrs_userCount=  DB::table('products_attrs_user')->where(['product_attribute_id'=>$product_atrr_id,'user_id'=>1])->count();
                if($products_attrs_userCount!==0){// check if this product for this user already to update on it if its exist

                    //if yes 
                if($request->quantityProductInCartUser!=0){//check if quantity put it not equal  0


                //decrease quantity this product from cart
                $productAttrUserInfo=  DB::table('products_attrs_user')->where(['product_attribute_id'=>$product_atrr_id,'user_id'=>1])->first();
                $productAttrUserInfo=  DB::table('products_attrs_user')->where(['product_attribute_id'=>$product_atrr_id,'user_id'=>1])->update(['product_attr_quantity'=>$productAttrUserInfo->product_attr_quantity-$request->quantityProductInCartUser]);


                //increase quantity this product into store
                $productAttrInfo=ProductAttribute::where(['id'=>$product_atrr_id])->first();
                ProductAttribute::where(['id'=>$product_atrr_id])->update(['product_attr_quantity'=>$productAttrInfo->product_attr_quantity+$request->quantityProductInCartUser]);
                
                //check if quantity this product in cart user is equal 0 will remove it from user cart
                $productAttrUserInfo=  DB::table('products_attrs_user')->where(['product_attribute_id'=>$product_atrr_id,'user_id'=>1])->first();
                if($productAttrUserInfo->product_attr_quantity==0){
                    DB::table('products_attrs_user')->where(['product_attribute_id'=>$product_atrr_id,'user_id'=>1])->delete();

                }

                return response()->json([
                    'status'=>404,
                    'message'=>' this quantity from this product in your cart moved successfully (updated your cart successfully )'
                ]);


                }else{
                      //if no
                      return response()->json([
                        'status'=>404,
                        'message'=>'sorry, you cannt put quantity = 0 if you want put it = 0 , you can delete this product from your cart '
                    ]);
                }
            }else{
                //if no
                return response()->json([
                    'status'=>404,
                    'message'=>'this product not exist in cart this user'
                ]);
            }
        //     }else{
        //         return response()->json([
        //             'status'=>401,
        //             'message'=>'you can not see this page , because you havent auth in this page'
        //         ]);
        //     }
        // }catch(\Exception $ex){
        //     return response()->json([
        //         'status'=>500,
        //         'message'=>'There is something wrong, please try again'
        //     ]);  
        // } 
    }
    public function deleteProductFromUserCart($product_atrr_id){
      //  try{    
            // if (auth()->check()){
            //     $user=auth()->user(); 
                // DB::table('products_attrs_user')->where(['user_id'=>$user->id,'product_attribute_id'=>$product_atrr_id])->delete();
             $product_atrr_InfoCount=  ProductAttribute::where(['id'=>$product_atrr_id])->count();
                if($product_atrr_InfoCount==0){//if this product is not  exist in the store 

                }
             $productAttrUserInfo=   DB::table('products_attrs_user')->where(['user_id'=>1,'product_attribute_id'=>$product_atrr_id])->first();

              $productAttrInfo=  ProductAttribute::where(['id'=>$product_atrr_id])->first();
              //insert all quantitites the product  that will delete from cart user -> into quantity this product in the store
                ProductAttribute::where(['id'=>$product_atrr_id])->update(['product_attr_quantity'=>$productAttrInfo->product_attr_quantity+$productAttrUserInfo->product_attr_quantity]);
                //delete this product with all quantities its ->from  cart user
                DB::table('products_attrs_user')->where(['user_id'=>1,'product_attribute_id'=>$product_atrr_id])->delete();
                return response()->json([
                    'status'=>200,
                    'message'=>'deleted product from your cart successfully'
                ]);
        //     }else{
        //         return response()->json([
        //             'status'=>401,
        //             'message'=>'you can not see this page , because you havent auth in this page'
        //         ]);
        //     }
        // }catch(\Exception $ex){
        //     return response()->json([
        //         'status'=>500,
        //         'message'=>'There is something wrong, please try again'
        //     ]);  
        // } 
        
    }
}
