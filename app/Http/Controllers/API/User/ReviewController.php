<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function ShowReviewers($product_attr_id=null){
      try{
        $revsCount=Review::where(['product_attr_id'=>$product_attr_id])->count();
        if($revsCount!==0){
          $revs=Review::where(['product_attr_id'=>$product_attr_id])->get();
          return response()->json([
            'status'=>200,
            'message'=>$revs
          ]);  
        }else{
            return response()->json([
                'status'=>200,
                'message'=>'there is no reviews on this product'
              ]);  
        }
      }catch(\Exception $ex){
        return response()->json([
            'status'=>500,
            'message'=>'There is something wrong, please try again'
        ]);  
      } 
    }
    public function getUserReviewsOnProducts(){
       try{
      //   if (auth()->check()){
      //     $user=auth()->user();
          // $userFavReviews= Favorite::where(['user_id'=>$user['id']])->paginate(10);
          $userFavReviews=Review::where(['user_id'=>1])->paginate(10);
          return response()->json([
              'status'=>200,
              'message'=>$userFavReviews
          ]);
              
      //   }else{
      //       return response()->json([
      //           'status'=>401,
      //           'message'=>'you can not see this page , because you havent auth in this page'
      //       ]);
      //   }
      }catch(\Exception $ex){
        return response()->json([
            'status'=>500,
            'message'=>'There is something wrong, please try again'
        ]);  
      }     
    }
    public function getReviewsOnProduct($product_attr_id){
      // try{

          $userFavReviews=Review::where(['product_attr_id'=>$product_attr_id])->paginate(10);
          return response()->json([
              'status'=>200,
              'message'=>$userFavReviews
          ]);
              

      // }catch(\Exception $ex){
      //   return response()->json([
      //       'status'=>500,
      //       'message'=>'There is something wrong, please try again'
      //   ]);  
      // }     
    }


    
  
      
      public function addUserReview(Request $req,$product_attr_id=null){
        // try{ 
        //   if (auth()->check()){
        //       $user=auth()->user();
              $data=$req->all();
              $userReviewCount= Review::where(['user_id'=>1,'product_attr_id'=>$product_attr_id])->count();
              if($userReviewCount==0){
                $newReview=new Review();
                $newReview->product_attr_id=$product_attr_id;
               // $newReview->review_description=$data['review_description'];
                $newReview->user_id=1;
                $newReview->rank_review=$req->input('body');
                $newReview->save();
                return response()->json([
                    'status'=>200,
                    'message'=>'added your review successfully'
                ]);
    
            }else{
                return response()->json([
                    'status'=>400,
                    'message'=>'you added review on this product , so now you can not add it again'
                ]);
            }
      //     }else{
      //         return response()->json([
      //             'status'=>401,
      //             'message'=>'you can not see this page , because you havent auth in this page'
      //         ]);
      //     }
      //   }catch(\Exception $ex){
      //     return response()->json([
      //         'status'=>500,
      //         'message'=>'There is something wrong, please try again'
      //     ]);  
      // } 
        
      }
      public function editMyReview(Request $req,$product_attr_id=null){
           try{
          //   if (auth()->check()){
          //     $user=auth()->user();
              $data=$req->all();
              // $userReview= Review::where(['user_id'=>$user['id'],'product_attr_id'=>$product_attr_id])->first();
              $userReview= Review::where(['product_attr_id'=>$product_attr_id])->first();
              $userReview->review_description=$data['review_description'];
              $userReview->review_rank=$data['review_rank'];
              $userReview->save();
              return response()->json([
                  'status'=>200,
                  'message'=>'updated your review successfully'
              ]);
        //     }else{
        //         return response()->json([
        //             'status'=>200,
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
      public function deleteMyReview($rev_id=null){
        try{
          if (auth()->check()){
            $deleteReview=Review::where(['id'=>$rev_id])->first();
            $deleteReview->delete();
            return response()->json([
                'status'=>200,
                'message'=>'deleted review succefully'
            ]);
          }else{
              return response()->json([
                  'status'=>401,
                  'message'=>'you can not see this page , because you havent auth in this page'
              ]);
          }
        }catch(\Exception $ex){
          return response()->json([
              'status'=>500,
              'message'=>'There is something wrong, please try again'
          ]);  
        } 
      }
}
