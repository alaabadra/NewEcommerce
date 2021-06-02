<?php

namespace App\Http\Controllers\API\User;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\SimilarProduct;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Discount;
use App\Models\Discount as ModelsDiscount;

class HomeController extends Controller
{
   
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //get products this user to be cart for this user
        $productsUser=User::find(1)->productsAttrsUser()->get();
        session()->put('cartInfo',$productsUser);
        $sessionCartInfo=session()->get('cartInfo');
        //put putQuantityForProductBasedOnProdAttr
        //$this->putQuantityForProductBasedOnProdAttr();
        return response()->json([
            'status'=>200,
            'message'=>$sessionCartInfo
        ]);
       // return view('home');
    }
    

    public function latestOffers(){//get from discount : the latest the discounts on the products
    $latestOffers=  Discount::with('products')->latest()->paginate(9);
      return response()->json([
        'status'=>200,
        'message'=>$latestOffers
      ]);
    }
    public function mostPopularCategories(){
        $mostPopularCategories=Category::where('category_visit_num','>',3)->get();
        return response()->json([
            'status'=>200,
            'message'=>$mostPopularCategories
          ]);
    }
    public function autocompleteSearch(Request $req){
        $categoriesAutocomplete=Product::select("product_name")
                                ->where("product_name","LIKE","%{$req->input('body')}%")
                                ->get();
        $productsAutocomplete=Product::select("product_name")
                                ->where("product_name","LIKE","%{$req->input('body')}%")
                                ->get();
        return  response()->json([
            'status'=>200,
            'categoriesAutocomplete'=>$categoriesAutocomplete,
            'productsAutocomplete'=>$productsAutocomplete
        ]);
    }
    public function search(Request $req){
        $searchProduct=Product::where(['product_name'=>$req->input('body')])->get();
        $searchCategory=Category::where(['category_name'=>$req->input('body')])->get();
        $searchUser=User::where(['name'=>$req->input('body'),'email'=>$req->input('body')])->get();
        return response()->json([
            'status'=>200,
            'datasearchProduct'=>$searchProduct,
            'datasearchCategory'=>$searchCategory,
            'datasearchUser'=>$searchUser
        ]);

    }
    public function viewLatestProducts(){
        try{
            $latestProducts=Product::latest()->paginate(6);
            return response()->json([
                'status'=>200,
                'message'=>$latestProducts
            ]);  
        }catch(\Exception $ex){
            return response()->json([
                'status'=>500,
                'message'=>'There is something wrong, please try again'
            ]);  
        }
    }
    public function viewLatestCategories(){
        try{
            $latestCategories=Category::latest()->paginate(6);
            return response()->json([
                'status'=>200,
                'message'=>$latestCategories
            ]);  
        }catch(\Exception $ex){
            return response()->json([
                'status'=>500,
                'message'=>'There is something wrong, please try again'
            ]);  
        }
    }

    public function viewPopularProducts(){
        try{
            $popularProducts=Product::where(['product_popular'=>1])->paginate(6);
            return response()->json([
                'status'=>200,
                'message'=>$popularProducts
            ]);  
        }catch(\Exception $ex){
            return response()->json([
                'status'=>500,
                'message'=>'There is something wrong, please try again'
            ]);  
        }
    }

    public function viewFeatureProducts(){
        try{
            $featureProducts=Product::where(['product_feature'=>1])->paginate(6);
            return response()->json([
                'status'=>200,
                'message'=>$featureProducts
            ]);  
        }catch(\Exception $ex){
            return response()->json([
                'status'=>500,
                'message'=>'There is something wrong, please try again'
            ]);  
        }
    }

    public function getTheBestProducts(){
       try{
            $bestProducts=Product::where(['product_the_best'=>1])->paginate(6);
            return response()->json([
                'status'=>200,
                'message'=>$bestProducts
            ]);  
        }catch(\Exception $ex){
            return response()->json([
                'status'=>500,
                'message'=>'There is something wrong, please try again'
            ]);  
        }  
    }

    public function getTheMoreSaleProducts(){
       try{
            $moreSaleProducts=ProductAttribute::where('product_attr_quantity','>',4)->paginate(9);

            return response()->json([
                'status'=>200,
                'message'=>$moreSaleProducts
            ]);  
        }catch(\Exception $ex){
            return response()->json([
                'status'=>500,
                'message'=>'There is something wrong, please try again'
            ]);  
        }  
    }

    
}
