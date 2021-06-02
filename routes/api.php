<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace'=>'API'],function(){

################################USER Route ##############################################
//  Route::group(['prefix'=>'user','namespace'=>'User','middleware'=>'CheckAuthUser:api'],function(){
    Route::group(['prefix'=>'user','namespace'=>'User'],function(){
############################Orders######################################
    Route::group(['prefix'=>'orders'],function(){
        Route::post('/place-order/{orderId}', 'OrdersController@placeOrder')->name('user.user.placeOrder');
        Route::post('/get-user-orders', 'OrdersController@getuserOrders')->name('user.user.get_user_orders');
        Route::post('/add-to-user-order', 'OrdersController@addTouserOrder')->name('user.user.add_to_user_order');
        Route::post('/edit-user-order', 'OrdersController@EditUserOrder')->name('user.user.edit_user_order');
        Route::get('/view-all-user-orders-review', 'OrdersController@viewAlluserOrdersReview')->name('user.user.view_all_user_orders_review');
        Route::get('/order-review-details', 'OrdersController@orderReviewDetails')->name('user.user.order_review_details');
        Route::post('/delete-order', 'OrdersController@deleteOrder')->name('user.user.delete_order');
    
    });
    ############################Carts######################################
    Route::group(['prefix'=>'carts'],function(){
        Route::post('/add-to-cart-user/{productAttrId}', 'CartsController@addToCartUser')->name('user.user.add_to_my_cart');
        Route::post('/update-cart-user-increase-quantity-prod/{productAttrId}', 'CartsController@updateCartUserIncreaseQuantityProd')->name('user.user.updateCartUserIncreaseQuantityProd');
        Route::post('/update-cart-user-decrease-quantity-prod/{productAttrId}', 'CartsController@updateCartUserDecreaseQuantityProd')->name('user.user.updateCartUserDecreaseQuantityProd');
        Route::get('/get-user-cart', 'CartsController@getUserCart')->name('user.user.get_user_cart');
        Route::post('/delete-product-from-user-cart/{productAttrId}', 'CartsController@deleteProductFromUserCart')->name('user.user.delete_product_from_my_cart');

    });
    Route::get('/reg', 'UserController@register')->name('user.user.register');
    Route::post('/reg', 'UserController@registerPost')->name('user.user.register_post');
    Route::get('/login','UserController@getlogin')->name('api.user.login');
    Route::post('/login','UserController@loginPost')->name('api.user.login-post');
    Route::post('/search', 'HomeController@search')->name('user.user.search');
    Route::get('/index', 'HomeController@index')->name('user.user.index');
    Route::get('/autocomplete-search', 'HomeController@autocompleteSearch')->name('user.user.autocomplete_search');
    
    Route::get('/get-the-best-products', 'HomeController@getTheBestProducts')->name('user.user.get_the_best_products');
    Route::get('/get-the-more-sale-products', 'HomeController@getTheMoreSaleProducts')->name('user.user.get_the_more_sale_products');
    Route::get('/get-the-latest-offers', 'HomeController@latestOffers')->name('user.user.get_the_latest_offers');
    Route::get('/most-popular-categories', 'HomeController@mostPopularCategories')->name('user.user.most_popular_categories');
    
 ############################Users######################################
    Route::group(['prefix'=>'users'],function(){
        Route::get('/view-my-profile', 'UserController@viewMyProfile')->name('user.user.view_my_profile');
        Route::get('/get-user-id/{token}', 'UserController@getUserId')->name('user.user.get_user_id');
        Route::get('/edit-my-profile', 'UserController@editMyProfile')->name('user.user.edit_my_profile');
        Route::get('/update-my-password', 'UserController@updateMyPassword')->name('user.user.update_my_password');
        Route::get('/change-my-image', 'UserController@changeMyImage')->name('user.user.change_my_image');
        Route::get('/checkout-shipping', 'UserController@checkoutShipping')->name('user.user.checkout_shipping');
        Route::get('/checkout-billing', 'UserController@checkoutBilling')->name('user.user.checkout_billing');
        ############################Reviews######################################
        Route::group(['prefix'=>'reviews'],function(){
            Route::get('/get-user-reviews-on-products/', 'ReviewController@getUserReviewsOnProducts')->name('user.user.get_user_reviews_on_products');
            Route::get('/get-reviews-on-product/{product_attr_id}', 'ReviewController@getReviewsOnProduct')->name('user.user.get_user_review_on_product');
            Route::post('/add-user-review/{product_attr_id}', 'ReviewController@addUserReview')->name('user.user.add_user_review');
            Route::post('/edit-user-review/{id}/{product_attr_id}', 'ReviewController@editUserReview')->name('user.user.edit_user_review');
            Route::post('/delete-user-review/{id}', 'ReviewController@deleteUserReview')->name('user.user.delete_user_review');
        });
        ############################Categories######################################
        Route::group(['prefix'=>'categories'],function(){
            //get
            Route::get('/all-categories', 'CategoriesController@getAllCategories')->name('user.allCategories.get_all_categories');
            Route::get('/get-category', 'CategoriesController@getCategory')->name('user.category.get_category');
            Route::get('/get-main-categories', 'CategoriesController@getMainCategories')->name('user.categories.get_main_categories');
            Route::get('/get-sub-categories', 'CategoriesController@getSubCategories')->name('user.categories.get_sub_categories');
            Route::get('/get-feature-sub-categories', 'CategoriesController@getFeatureSubCategories')->name('user.categories.get_sub_categories');
            Route::get('/show-category/{parentCategoryId}/{subCategoryId}', 'CategoriesController@showCategory')->name('user.categories.show_category');
            Route::get('/show-category', 'CategoriesController@showCategory')->name('user.categories.show_category');
        });
        ############################comments product######################################
        Route::group(['prefix'=>'comments-product-attr'],function(){
            Route::post('/store/{product_attr_id}', 'CommentsProductAttrController@store')->name('user.comment.store');
            Route::post('/update/{id}/{product_attr_id}', 'CommentsProductAttrController@update')->name('user.comment.update');
            Route::post('/delete/{commentId}/{product_attr_id}', 'CommentsProductAttrController@delete')->name('user.comment.delete');
            Route::get('/show/{commentId}', 'CommentsProductAttrController@show')->name('user.comment.show');
            Route::get('/show-comments-product-attr/{productAttrId}', 'CommentsProductAttrController@index')->name('user.comment.all_comments_product');
        });
        ############################Coupons######################################
        Route::group(['prefix'=>'coupons'],function(){
            Route::post('/store', 'CouponcodesController@store')->name('user.coupon.store');
            Route::post('/update/{id}', 'CouponcodesController@update')->name('user.coupon.update');
            Route::post('/delete/{couponId}', 'CouponcodesController@delete')->name('user.coupon.delete');
            Route::get('/show/{couponId}', 'CouponcodesController@show')->name('user.coupon.show');
            Route::get('/apply-couponcodes-product/{couponId}', 'CouponcodesController@applyCouponcodesProduct')->name('user.coupon.applyCouponcodesProduct');
        });


        ############################Deliveries######################################sanctum

        Route::group(['prefix'=>'deliveries'],function(){

        });
        ############################favorites######################################
        Route::group(['prefix'=>'favorites'],function(){
            Route::post('/add-product-into-user-favorite/{productAttrId}', 'FavoritesController@addProductIntouserFavorite')->name('user.user.add_product_into_my_favorite');
            Route::get('/delete-prod-from-user-favourites', 'FavoritesController@deleteProdFromUserFavourites')->name('user.user.delete_prod_from_my_favourites');
            Route::get('/get-user-favorites', 'FavoritesController@getUserFavorites')->name('user.user.get_user_favorits');
        });
        ############################Newsletters######################################
        Route::group(['prefix'=>'newsletters'],function(){

        });

        ############################pincodes######################################
        Route::group(['prefix'=>'pincodes'],function(){

        });
        ############################products######################################
        Route::group(['prefix'=>'products'],function(){
            Route::get('/get-all-products', 'ProductsController@getAllProducts')->name('user.products.get_all_products');
            Route::get('/get-products-for-sub-categories/{categoryId}', 'ProductsController@getProductsForSubCategories')->name('user.products.get_product_for_sub_categories');
            Route::get('/get-modern-products/', 'ProductsController@getModernProducts')->name('user.products.get_modern_products');

            Route::get('/show-product/{productId}', 'ProductsController@showProduct')->name('user.product.show_product');
            Route::get('/show-products-category/{productId}', 'ProductsController@showProductsCategory')->name('user.product.show_products_categories');
        });
        ############################products-attributes######################################
        Route::group(['prefix'=>'product-attributes'],function(){
        //   Route::get('/get-product-attributes', 'ProductAttributesController@getProductAttributes')->name('user.product_attributes.get_product_attributes');
            Route::get('/show-product-attribute/{productAttrId}', 'ProductAttributesController@showProductAttribute')->name('user.product_attribute.showProductAttribute');
            Route::get('/show-product-attributes/{productId}', 'ProductAttributesController@showProductAttributes')->name('user.product_attribute.showProductAttributes');
            
        });

        ############################similarProducts######################################
        Route::group(['prefix'=>'similar-products'],function(){
            Route::get('/show-similar-product/{productId}', 'SimilarProductsController@showSimilarProduct')->name('user.similar_product.show_similar_product');
            Route::get('/show-similar-products/{productId}', 'SimilarProductsController@showSimilarProducts')->name('user.similar_product.show_similar_products');
        });

    });

});
});