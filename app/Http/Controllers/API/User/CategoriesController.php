<?php

namespace App\Http\Controllers\User;

use App\Events\CategoryVisitors;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function getAllCategories(){
     try{
        $allCategories=Category::with('subCategories')->get();
        return response()->json([
            'status'=>200,
            'message'=>$allCategories
        ]);
       }catch(\Exception $ex){
            return response()->json([
                'status'=>500,
                'message'=>'There is something wrong, please try again'
            ]);  
        }    
    }
    public function getCategory(){
        $category=Category::first();
        return response()->json([
            'status'=>200,
            'message'=>$category
        ]);
    }

    public function getMainCategories(){
     try{
        $mainCategories=Category::where(['parent_id'=>null])->paginate(10);
        return response()->json([
            'status'=>200,
            'message'=>$mainCategories
        ]);
       }catch(\Exception $ex){
            return response()->json([
                'status'=>500,
                'message'=>'There is something wrong, please try again'
            ]);  
        } 
    }

    public function getSubCategories(){
        try{
          $subCategories=Category::where('parent_id','!=','')->paginate(10);
          return response()->json([
              'status'=>200,
              'message'=>$subCategories
          ]);
         }catch(\Exception $ex){
              return response()->json([
                  'status'=>500,
                  'message'=>'There is something wrong, please try again'
              ]);  
          } 
      }

      public function getFeatureSubCategories(){
        try{
          $subCategories=Category::where('category_feature','=',1)->paginate(10);
          return response()->json([
              'status'=>200,
              'message'=>$subCategories
          ]);
         }catch(\Exception $ex){
              return response()->json([
                  'status'=>500,
                  'message'=>'There is something wrong, please try again'
              ]);  
          } 
      }


      public function showCategory($parent_category_id,$sub_category_id){
        try{
            $subCategory=  Category::where(['id'=>$sub_category_id])->first();
            $paranetThisCategory=Category::where(['id'=>$parent_category_id])->first();
            $contentTheCatogory=Product::where(['category_id'=>$sub_category_id])->get();//all products that it in thid category
            //event(new CategoryVisitors($subCategory));
            return response()->json([
                'status'=>200,
                'infoSubCategory'=>$subCategory,
                'infoMainCategory'=>$paranetThisCategory,
                'contentTheCatogory'=>$contentTheCatogory
            ]);
        }catch(\Exception $ex){
            return response()->json([
                'status'=>500,
                'message'=>'There is something wrong, please try again'
            ]);  
        } 
      }
      
}
