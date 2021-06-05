<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

// class User extends Authenticatable implements Tymon\JWTAuth\Contracts\JWTSubject
class User extends Authenticatable
{
    protected $guard='user';
    use  Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function productsAttrsUser(){
        return $this->belongsToMany("App\Models\ProductAttribute"
        ,'products_attrs_user')
        ->withPivot(['product_attr_quantity','product_attr_total']);
    }
}
