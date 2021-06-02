<?php

namespace App\Http\Controllers\API\User;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Couponcode;
use App\Models\Delivery;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function placeOrder(Request $req,$orderId){
        if($req->isMethod('post')){
            $orderDetails=Order::where('id',$orderId)->first();
            $orderProducts=Order::find($orderId)->productsOrders()->get();
            $shippingUserDetails=Delivery::find($orderDetails->user_id)->with('user')->first();
             $userName=$shippingUserDetails->name;
             $userDetails=User::find(1)->first();
            if($req->payment_method=='Payumoney'){
                $messageData=['type_your_payment'=>$req->payment_method,'name'=>$userName,'order'=>$orderDetails,'orderProducts'=>$orderProducts,'shippingUserDetails'=>$shippingUserDetails,'billingUser'=>$userDetails];
                // Mail::send('emails.order',$messageData,function($message) use ($emailUser){
                //     $message->to($emailUser)->subject('order placed - e-shopping website');
                // });
                    return response()->json([
                        'status'=>200,
                        'message'=>$messageData
                    ]);
            }elseif($req->payment_method=='COD'){
                $messageData=['type_your_payment'=>$req->payment_method,'name'=>$userName,'order'=>$orderDetails,'orderProducts'=>$orderProducts,'shippingUserDetails'=>$shippingUserDetails,'billingUser'=>$userDetails];
                // Mail::send('emails.order',$messageData,function($message) use ($emailUser){
                //     $message->to($emailUser)->subject('order placed - e-shopping website');
                // });
                    return response()->json([
                        'status'=>200,
                        'message'=>$messageData
                    ]);
         }else{
            $messageData=['type_your_payment'=>'paypal','name'=>$userName,'order'=>$orderDetails,'orderProducts'=>$orderProducts,'shippingUserDetails'=>$shippingUserDetails,'billingUser'=>$userDetails];

         }
        }
    }
    public function showOrder($order_id){
        try{
            $order=Order::where(['id'=>$order_id])->first();
            return response()->json([
                'status'=>200,
                'message'=>$order
            ]);
        }catch(\Exception $ex){
            return response()->json([
                'status'=>500,
                'message'=>'There is something wrong, please try again'
            ]);  
        } 

    }

    public function getUserOrders(){
        try{
            // if (auth()->check()){
                // $user=auth()->user();
                // $myOrders=Order::where(['user_id'=>$user['id']])->with('productAttrs')->get();
                $myOrders=Order::where(['user_id'=>1])->with('productAttrs')->get();
                return response()->json([
                    'status'=>200,
                    'message'=>$myOrders
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
    public function AddToUserOrder($product_attr_id=null,Request $req){
        try{        
            // if (auth()->check()){
                // $user=auth()->user();
                // $couponThisUser=Couponcode::where(['user_id'=>$user['id']])->first();
                $couponThisUser=Couponcode::where(['user_id'=>1])->first();
                if(empty($couponThisUser->coupon_code)){
                    $routeAddMyCode='user.coupon.store';
                    return response()->json([
                        'status'=>400,
                        'message'=>'you must add your code before making your order, after that you can add your product into your order, from here'.$routeAddMyCode
                    ]);
                }else{
                    $couponCodeThisUser= $couponThisUser->coupon_code;
                    //get total  for all products in cart this user
                    // $cartForThisUser = Cart::where(['user_id'=>$user['id']])->first();
                    $cartForThisUser = Cart::where(['user_id'=>1])->first();
                    $productsInCartForThisUser = ProductAttribute::where(['cart_id'=>$cartForThisUser->cart_id])->get();
                    $sub_total=0;
                    foreach($productsInCartForThisUser as $prod){
                        $prodPrice=$prod->product_price;
                        $sub_total=$sub_total+$prodPrice;
                    }
                    $tax=1.3;
                    $total=$sub_total*$tax;
        
                //now i had couponAmount for this user , so now can store in table order
                    $data=$req->all();
                    $neworder=new Order;
                    // $neworder->user_id=$user['id'];
                    $neworder->user_id=1;
                    $neworder->cart_id=$cartForThisUser->cart_id;
                    $neworder->sub_total=$sub_total;
                    $neworder->tax=$tax;
                    $neworder->total=$total;
                    $neworder->coupon_code=$couponCodeThisUser;
                    $neworder->billing_email=$data['billing_email'];
                    $neworder->billing_name=$data['billing_name'];
                    $neworder->billing_address=$data['billing_address'];
                    $neworder->billing_phone=$data['billing_phone'];
                    $neworder->payment_method=$data['payment_method'];
                    $neworder->number_card=$data['number_card'];
                    $neworder->order_status='in-progress';
                    $neworder->save();//now became order for this user
                    $sub_total=0;
                    foreach($productsInCartForThisUser as $prod){
                    //will store it in table OrdersProduct to store product in this order
                    $orderId=  $neworder->id;
                    DB::table('order_product_attributes')->insert(['order_id'=>$orderId,'product_attr_id'=>$prod->id]);
                    
                    ProductAttribute::where(['id'=>$prod->id])->update(['cart_id'=>0]);
                    
                    //in this step will the cart become is empty from these products
                    }
                    return response()->json([
                        'status'=>200,
                        'message'=>'added  your orders successfully'
                    ]);    

                }
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

public function EditUserOrder($order_id=null,Request $req){
     try{
        // if (auth()->check()){
            $user=auth()->user();
            // $couponThisUser=Couponcode::where(['user_id'=>$user['id']])->first();
            $couponThisUser=Couponcode::where(['user_id'=>1])->first();
            //get total  for all products in cart this user
            // $cartForThisUser = Cart::where(['user_id'=>$user['id']])->first();
            $cartForThisUser = Cart::where(['user_id'=>1])->first();
            $productsInCartForThisUser = ProductAttribute::where(['cart_id'=>$cartForThisUser->cart_id])->get();
            $sub_total=0;
            foreach($productsInCartForThisUser as $prod){
                $prodPrice=$prod->product_price;           
                $sub_total=$sub_total+$prodPrice;
                
            }
            $tax=1.3;
            $total=$sub_total*$tax;
            $data=$req->all();
            $order=Order::where(['id'=>$order_id])->first();
           // $order->user_id=$user['id'];
            $order->user_id=1;
            $order->sub_total=$sub_total;
            $order->tax=$tax;
            $order->total=$total;
            $order->coupon_code=$couponThisUser->coupon_code;
            $order->billing_email=$req->input('billing_email');
            $order->billing_name=$req->input('billing_name');
            $order->billing_address=$req->input('billing_address');
            $order->billing_phone=$req->input('billing_phone');
            $order->payment_method=$req->input('payment_method');
            $order->number_card=$req->input('number_card');
            $order->order_status=$req->input('order_status');
            $order->save();//now became order for this user
            return response()->json([
                'status'=>200,
                'message'=>'updated your orders successfully'
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

public function viewAllUserOrdersReview(){
   try{
    //     if (auth()->check()){
    //         $user=auth()->user();
            // $allMyOrdersCount= Order::where(['user_id'=>$user['id']])->count();
            $allMyOrdersCount= Order::where(['user_id'=>1])->count();
            if($allMyOrdersCount==0){
                return response()->json([
                    'status'=>200,
                    'message'=>'you have not any order until now'
                ]);
            }else{
                // $allMyOrders= Order::where(['user_id'=>$user['id']])->get();  
                $allMyOrders= Order::where(['user_id'=>1])->get();  
                return response()->json([
                    'status'=>200,
                    'message'=>$allMyOrders
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
    public function orderReviewDetails($order_id){
        try{
            // if (auth()->check()){
                $order=Order::where(['id'=>$order_id])->first();
                return response()->json([
                    'status'=>200,
                    'message'=>$order
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
    public function deleteUserOrder($order_id=null){
        try{
            // if (auth()->check()){
                $order=Order::where(['id'=>$order_id])->first();
                $order->delete();
                $orderProd=DB::table('order_product_attributes')->where(['order_id'=>$order_id]);
                $orderProd->delete();
                return response()->json([
                    'status'=>200,
                    'message'=>'deleted order successfully'
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
