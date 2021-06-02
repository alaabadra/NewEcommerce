<?php

namespace App\Http\Controllers\API\User;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Delivery;
use App\Models\Favorite;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\Role;
use App\Models\User;
use App\PersonalAccessToken;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(){
        return view('auth.register');
    }
    public function registerPost(Request $req){
        try{
            $data=$req->all();
            $userCount=User::where('email',$data['email'])->count();
            if($userCount>0){
                return redirect()->back()->with('flash_message_error','email is exist already');
            }else{
            if($data['password_confirmation']==$data['password']){
            $user=new User();
            $user->email=$data['email'];
            $user->password=bcrypt($data['password']);
            $user->name=$data['name'];
            $user->save();
                $role=new Role();
                $role->name='user';
                $role->save();
                DB::table('role_user')->insert(['role_id'=>$role['id'],'user_id'=>$user['id'],'user_type'=>'App\User']);
            return redirect('/api/user/login');
            }else{
                return redirect()->back()->with('flash_message_error','password must be matching');
            }
            }
        }catch(\Exception $ex){
            return response()->json([
                'status'=>500,
                'message'=>'There is something wrong, please try again'
            ]);  
        } 
    }
    
    public function getLogin(){
        return view('auth.login');
    }

    public function loginPost(Request $req){

        try{
            $user = User::where('email', $req->email)->first();

            if (! $user || ! Hash::check($req->password, $user->password)) {
                
                throw ValidationException::withMessages([
                    'email' => ['The provided credentials are incorrect.'],
                ]);
            }
            // return $req->user()->secrets;

            return $user->createToken('device_name')->plainTextToken;
         }catch(\Exception $ex){
              return response()->json([
                  'status'=>500,
                  'message'=>'There is something wrong, please try again'
              ]);  
          } 
    }
    public  function getUserId($token){
        try{
                $userId=PersonalAccessToken::where(['token'=>$token])->first();
                return response()->json([
                    'status'=>200,
                    'message'=>$userId
                ]);

        }catch(\Exception $ex){
            return response()->json([
                'status'=>500,
                'message'=>'There is something wrong, please try again'
            ]);  
        }         
    }
    public function viewMyProfile(Request $request){
        try{
            // if (auth()->check()){
                $user=auth()->user();
               // $dataThisUser=User::where(['user_id'=>$user['id']])->first();
                $dataThisUser=User::where(['user_id'=>1])->first();
                return response()->json([
                    'status'=>200,
                    'message'=>$dataThisUser
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
    public function editMyProfile(Request $req){
        try{
            // if (auth()->check()){
                // $user=auth()->user();
                $data=$req->all();
                User::where(['user_id'=>1])->update(['name'=>$data['name'],'image'=>$data['image'],'email'=>$data['email']]);
                // User::where(['user_id'=>$user['id']])->update(['name'=>$data['name'],'image'=>$data['image'],'email'=>$data['email']]);
                return response()->json([
                    'status'=>200,
                    'message'=>'updated profile successfully'
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
    public function updateMyPassword(Request $req){
        try{
            // if (auth()->check()){
                // $user=auth()->user();
                // $dataThisUser=User::where(['id'=>$user['id']])->first();
                $dataThisUser=User::where(['id'=>1])->first();
                $data=$req->all();
                $oldPassDb=$dataThisUser->password;
                $oldPassReq= bcrypt($data['old_password']);
                if($oldPassDb==$oldPassReq){
                    $newPassReq=bcrypt($data['new_password']);
                    User::where('id',1)->update(['password'=>$newPassReq]);
                    // User::where('id',$user['id'])->update(['password'=>$newPassReq]);
                    return response()->json([
                        'status'=>200,
                        'message'=>'updated your password successfully'
                    ]);
                    
                }else{
                    return response()->json([
                        'status'=>400,
                        'message'=>'pls, write correct your old pass'
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

    public function changeMyImage(Request $req){
        try{
            // if (auth()->check()){
                $user=auth()->user();
                // $user=User::where(['id'=>$user['id']])->first();
                $user=User::where(['id'=>1])->first();
                $filePath="";
                // if($req->has('image')){
                //     $filePath=uploadImage('users',$req->photo);
                //     $user->image=$filePath;
                //     $user->save();
                //     return response()->json([
                //         'status'=>200,
                //         'message'=>'updated your photo successfully'
                //     ]);
                // }
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
    public function checkoutShipping(Request $req){
        try{
            if (auth()->check()){
                $user=auth()->user();
                $data=$req->all();
                // $deliveryThisUser=Delivery::where(['user_id'=>$user['id']])->count();
                $deliveryThisUser=Delivery::where(['user_id'=>1])->count();
                if($deliveryThisUser>0){
                    // $delivery=Delivery::where(['user_id'=>$user['id']])->first();
                    $delivery=Delivery::where(['user_id'=>1])->first();
                    $delivery->email=$data['email_shipping'];
                    $delivery->name=$data['name_shipping'];
                    $delivery->pincode=$data['pincode_shipping'];
                    $delivery->state=$data['state_shipping'];
                    $delivery->address=$data['address_shipping'];
                    $delivery->mobile=$data['mobile_shipping'];
                    $delivery->country_name=$data['country_name'];
                    $delivery->save();
                    return response()->json([
                        'status'=>200,
                        'message'=>'delivery updated successfully'.$delivery->name
                    ]);

                }else{
                    $newDelivery= new Delivery();
                    // $newDelivery->user_id=$user['id'];
                    $newDelivery->user_id=1;
                    $newDelivery->email=$data['email_shipping'];
                    $newDelivery->name=$data['name_shipping'];
                    $newDelivery->pincode=$data['pincode_shipping'];
                    $newDelivery->state=$data['state_shipping'];
                    $newDelivery->address=$data['address_shipping'];
                    $newDelivery->mobile=$data['mobile_shipping'];
                    $newDelivery->country_name=$data['country_name'];
                    $newDelivery->save();
                    return response()->json([
                        'status'=>200,
                        'message'=>'delivery added successfully'.$newDelivery->name
                    ]);

                }
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
