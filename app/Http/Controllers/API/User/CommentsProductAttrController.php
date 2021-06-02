<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\CommentsProductAttr;

use Illuminate\Http\Request;

class CommentsProductAttrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
        $comments=CommentsProductAttr::get();
        return response()->json([
            'status'=>200,
            'message'=>$comments
        ]);
    }catch(\Exception $ex){
        return response()->json([
            'status'=>500,
            'message'=>'There is something wrong, please try again'
        ]);  
    } 
    }

    public function getCommentsProductAttr($product_attr_id){
        try{
            $commentsProduct=CommentsProductAttr::where(['product_attr_id'=>$product_attr_id])->get();

            return response()->json([
                'status'=>200,
                'message'=>$commentsProduct
            ]);
        }catch(\Exception $ex){
            return response()->json([
                'status'=>500,
                'message'=>'There is something wrong, please try again'
            ]);  
        }
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$product_attr_id)
    {
        try{
        //     if (auth()->check()){
                //$user=auth()->user();
                $data=$request->all();
                // CommentsProductAttr::insert(['product_attr_id'=>$product_attr_id,'comment_body'=>$request->input('body'),'user_id'=>$user['id']]);
                CommentsProductAttr::insert(['product_attr_id'=>$product_attr_id,'comment_body'=>$request->input('body')]);
                return response()->json([
                    'status'=>200,
                    'message'=>'added comment on product  successfully'
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $commentsProduct=CommentsProductAttr::first();
            return response()->json([
                'status'=>200,
                'message'=>$commentsProduct
            ]);
        }catch(\Exception $ex){
            return response()->json([
                'status'=>500,
                'message'=>'There is something wrong, please try again'
            ]);  
        } 
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
        //     if (auth()->check()){
        //         $user=auth()->user();
                $data=$request->all();
                // CommentsProductAttr::where(['id'=>$id])->update(['comment_body'=>$data['comment_body'],'user_id'=>$user['id']]);
                CommentsProductAttr::where(['id'=>$id])->update(['comment_body'=>$request->input('body')]);
                return response()->json([
                    'status'=>200,
                    'message'=>'updated comment on product  successfully'
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        try{
        //     if (auth()->check()){
        //         $user=auth()->user();
                CommentsProductAttr::where(['id'=>$id])->delete();
                return response()->json([
                    'status'=>200,
                    'message'=>'deleted comment on product  successfully'
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
}
