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
##################################ADMIN Routes ###################################################

Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
    Route::group(['prefix'=>'admins'],function(){
    Route::get('/view', 'AdminsController@index')->name('admin.admins.view');
    Route::get('/create', 'AdminsController@create')->name('admin.admin.create');
    Route::post('/store', 'AdminsController@store')->name('admin.admin.store');
    Route::post('/update/{id}', 'AdminsController@update')->name('admin.admin.update');
    Route::get('/edit/{adminId}', 'AdminsController@edit')->name('admin.admin.edit');
    Route::post('/delete/{adminId}', 'AdminsController@destroy')->name('admin.admin.delete');
    Route::get('/show/{adminId}', 'AdminsController@show')->name('admin.admin.show');
});

Route::group(['prefix'=>'carts'],function(){
    Route::get('/view', 'CartsController@index')->name('admin.carts.view');
    Route::get('/create', 'CartsController@create')->name('admin.cart.create');
    Route::post('/store', 'CartsController@store')->name('admin.cart.store');
    Route::get('/edit/{cartId}', 'CartsController@edit')->name('admin.cart.edit');
    Route::post('/update/{cartId}', 'CartsController@update')->name('admin.cart.update');
    Route::post('/delete/{cartId}', 'CartsController@delete')->name('admin.cart.delete');
    Route::get('/show/{cartId}', 'CartsController@show')->name('admin.cart.show');
});


############################Categories######################################
Route::group(['prefix'=>'categories'],function(){
    //get
    Route::get('/all-categories', 'CategoriesController@allCategories')->name('admin.allCategories.get_all_categories');
    Route::get('/main-categories', 'CategoriesController@mainCategories')->name('admin.mainCategories.get_main_categories');
    Route::get('/main-all-categories', 'CategoriesController@getAllMainCategories')->name('admin.mainCategories.get_all_main_categories');
    Route::get('/sub-categories', 'CategoriesController@subCategories')->name('admin.subCategories.view');
    Route::get('/get-for-create-main-category', 'CategoriesController@getForCreateMainCategories')->name('admin.get_for_create_main_category.view');
    Route::get('/get-for-create-sub-category', 'CategoriesController@getForCreateSubCategories')->name('admin.get_for_create_sub_category.view');
    Route::get('/show/{categoryId}', 'CategoriesController@show')->name('admin.categorie.show');

    //store
    Route::post('/store-main-category', 'CategoriesController@storeMainCategory')->name('admin.categorie.store_main_category');
    Route::post('/store-sub-category', 'CategoriesController@storeSubCategory')->name('admin.categorie.store_sub_category');
    //update
    Route::post('/update-main-category/{categoryId}', 'CategoriesController@updateMainCategory')->name('admin.categorie.update_main_category');
    Route::post('/update-sub-category/{categoryId}', 'CategoriesController@updateSubCategory')->name('admin.categorie.update_sub_category');
    //delete
    Route::post('/delete/{categoryId}', 'CategoriesController@delete')->name('admin.categorie.delete');
});
############################Coupons######################################
Route::group(['prefix'=>'couponcodes'],function(){
    Route::get('/view', 'CouponcodesController@index')->name('admin.coupons.view');
    Route::post('/store', 'CouponcodesController@store')->name('admin.coupon.store');
    Route::post('/update/{id}', 'CouponcodesController@update')->name('admin.coupon.update');
    Route::post('/delete/{couponId}', 'CouponcodesController@delete')->name('admin.coupon.delete');
    Route::get('/show/{couponId}', 'CouponcodesController@show')->name('admin.coupon.show');
});

############################Deliveries######################################
Route::group(['prefix'=>'deliveries'],function(){
    Route::get('/view', 'DeliveriesController@index')->name('admin.deliveries.view');
    Route::get('/create', 'DeliveriesController@create')->name('admin.delivery.create');
    Route::post('/store', 'DeliveriesController@store')->name('admin.delivery.store');
    Route::get('/edit/{DeliveryId}', 'DeliveriesController@edit')->name('admin.delivery.edit');
    Route::post('/update/{DeliveryId}', 'DeliveriesController@update')->name('admin.delivery.update');
    Route::post('/delete/{DeliveryId}', 'DeliveriesController@delete')->name('admin.delivery.delete');
    Route::get('/show/{DeliveryId}', 'DeliveriesController@show')->name('admin.delivery.show');
});
############################favorites######################################
Route::group(['prefix'=>'favorites'],function(){
    Route::get('/view', 'FavoritesController@index')->name('admin.favorites.view');
    Route::get('/create', 'FavoritesController@create')->name('admin.favorite.create');
    Route::post('/store', 'FavoritesController@store')->name('admin.favorite.store');
    Route::get('/edit/{favoriteId}', 'FavoritesController@edit')->name('admin.favorite.edit');
    Route::post('/update/{favoriteId}', 'FavoritesController@update')->name('admin.favorite.update');
    Route::post('/delete/{favoriteId}', 'FavoritesController@delete')->name('admin.favorite.delete');
    Route::get('/show/{favoriteId}', 'FavoritesController@show')->name('admin.favorite.show');
});
############################Newsletters######################################
Route::group(['prefix'=>'newsletters'],function(){
    Route::get('/view', 'NewsletterSubscribersController@index')->name('admin.newsletters.view');
    Route::post('/store', 'NewsletterSubscribersController@store')->name('admin.newsletter.store');
    Route::post('/update/{newsletterId}', 'NewsletterSubscribersController@update')->name('admin.newsletter.update');
    Route::post('/delete/{newsletterId}', 'NewsletterSubscribersController@delete')->name('admin.newsletter.delete');
    Route::get('/show/{newsletterId}', 'NewsletterSubscribersController@show')->name('admin.newsletter.show');

});
############################Orders######################################
Route::group(['prefix'=>'orders'],function(){
    Route::get('/view', 'OrdersController@index')->name('admin.orders.view');
    Route::get('/create', 'OrdersController@create')->name('admin.order.create');
    Route::post('/store', 'OrdersController@store')->name('admin.order.store');
    Route::get('/edit/{orderId}', 'OrdersController@edit')->name('admin.order.edit');
    Route::post('/update/{orderId}', 'OrdersController@update')->name('admin.order.update');
    Route::post('/delete/{orderId}', 'OrdersController@delete')->name('admin.order.delete');
    Route::get('/show/{orderId}', 'OrdersController@show')->name('admin.order.show');
});
############################pincodes######################################
Route::group(['prefix'=>'pincodes'],function(){
    Route::get('/view', 'PincodesController@index')->name('admin.pincodes.view');
    Route::get('/create', 'PincodesController@create')->name('admin.pincode.create');
    Route::post('/store', 'PincodesController@store')->name('admin.pincode.store');
    Route::post('/update/{pincodeId}', 'PincodesController@update')->name('admin.pincode.update');
    Route::post('/delete/{pincodeId}', 'PincodesController@delete')->name('admin.pincode.delete');
    Route::get('/show/{pincodeId}', 'PincodesController@show')->name('admin.pincode.show');
});
############################products######################################
Route::group(['prefix'=>'products'],function(){
    Route::get('/view', 'ProductsController@index')->name('admin.products.view');
    Route::post('/store-product', 'ProductsController@storeProduct')->name('admin.product.store_product');
    Route::post('/update-product/{productId}', 'ProductsController@updateProduct')->name('admin.product.update_product');
    Route::post('/delete/{productId}', 'ProductsController@delete')->name('admin.product.delete');
    Route::get('/show-product/{productId}', 'ProductsController@showProduct')->name('admin.product.show_product');
    Route::get('/show-products-category/{productId}', 'ProductsController@showProductsCategory')->name('admin.product.show_products_categories');
});
############################products-attributes######################################
Route::group(['prefix'=>'product-attributes'],function(){
    Route::get('/view', 'ProductAttributesController@index')->name('admin.product_attributes.view');
    Route::post('/store-product-attr', 'ProductAttributesController@storeProductAttr')->name('admin.product_attribute.store_product_attr');
    Route::post('/update-product-attr/{id}', 'ProductAttributesController@updateProductAttr')->name('admin.product_attribute.update_product_attr');
    Route::post('/delete/{productAttrId}', 'ProductAttributesController@delete')->name('admin.product_attribute.delete');
    Route::get('/show-product-attribute/{productAttrId}', 'ProductAttributesController@showProductAttribute')->name('admin.product_attribute.showProductAttribute');
    Route::get('/show-product-attributes/{productId}', 'ProductAttributesController@showProductAttributes')->name('admin.product_attribute.showProductAttributes');
    
});


############################users######################################
Route::group(['prefix'=>'users'],function(){
    Route::get('/view', 'UsersController@index')->name('admin.users.view');
    Route::post('/store-user', 'UsersController@storeUser')->name('admin.user.store_user');
    Route::post('/update-user/{id}', 'UsersController@updateUser')->name('admin.user.update_user');
    Route::post('/delete/{userId}', 'UsersController@delete')->name('admin.user.delete');
    Route::get('/show/{userId}', 'UsersController@show')->name('admin.user.show');
});

    ############################banners######################################
    Route::group(['prefix'=>'banners'],function(){
        Route::get('/view', 'BannersController@viewBanners')->name('admin.banners.view_banners');
        Route::post('/store-banner', 'BannersController@storeBanner')->name('admin.banner.store_banner');
        Route::post('/update-banner/{id}', 'BannersController@updateBanner')->name('admin.banner.update_banner');
        Route::post('/delete/{id}', 'BannersController@deleteBanner')->name('admin.banner.delete_banner');
        Route::get('/show/{id}', 'BannersController@showBanner')->name('admin.banner.show_banner');
    });

    ############################addvertisments######################################
    Route::group(['prefix'=>'addvertisments'],function(){
        Route::get('/view', 'AddvertismentsController@viewaddvertisments')->name('admin.addvertisments.view');
        Route::post('/store-addvertisment', 'AddvertismentsController@storeaddvertisment')->name('admin.addvertisment.store_addvertisment');
        Route::post('/update-addvertisment/{id}', 'AddvertismentsController@updateaddvertisment')->name('admin.addvertisment.update_addvertisment');
        Route::post('/delete/{id}', 'AddvertismentsController@deleteaddvertisment')->name('admin.addvertisment.delete_addvertisment');
        Route::get('/show/{id}', 'AddvertismentsController@showaddvertisment')->name('admin.addvertisment.show');
    });
    ############################Web Pages######################################
    Route::group(['prefix'=>'web-pages'],function(){
        Route::get('/get-all-pages', 'WebPagesController@index')->name('admin.web_pages.view');
        Route::post('/store', 'WebPagesController@store')->name('admin.web_pages.store');
        Route::post('/update/{id}', 'WebPagesController@update')->name('admin.web_pages.update');
        Route::get('/show/{id}', 'WebPagesController@show')->name('admin.web_pages.show');
        Route::get('/show/{title}', 'WebPagesController@showPage')->name('admin.web_pages.show_page');
        Route::post('/delete/{id}', 'WebPagesController@delete')->name('admin.web_pages.delete');
    });
    
    Route::get('/logout', 'Admin\LoginController@logout')->name('admin.logout');
    
});
        Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
        Route::get('login','LoginController@login')->name('admin.login');
        Route::post('login','LoginController@loginPost')->name('api.admin.login-post');
        });

################################USER Route ##############################################
 ############################Users######################################
 Route::group(['prefix'=>'user','namespace'=>'User'],function(){
    Route::get('/reg', 'UserController@register')->name('user.user.register');
    Route::post('/reg', 'UserController@registerPost')->name('user.user.register_post');
    Route::get('/login','UserController@getlogin')->name('api.user.login');
    Route::post('/login','UserController@loginPost')->name('api.user.login-post');
    Route::post('/search', 'HomeController@search')->name('user.user.search');
    Route::get('/autocomplete-search', 'HomeController@autocompleteSearch')->name('user.user.autocomplete_search');
    
    Route::get('/get-the-best-products', 'HomeController@getTheBestProducts')->name('user.user.get_the_best_products');
    Route::get('/get-the-more-sale-products', 'HomeController@getTheMoreSaleProducts')->name('user.user.get_the_more_sale_products');
    Route::get('/get-the-latest-offers', 'HomeController@latestOffers')->name('user.user.get_the_latest_offers');
    Route::get('/most-popular-categories', 'HomeController@mostPopularCategories')->name('user.user.most_popular_categories');
    
     Route::group(['prefix'=>'users'],function(){
        // Route::group(['middleware'=>['auth:sanctum']],function(){
        Route::get('/view-my-profile', 'UserController@viewMyProfile')->name('user.user.view_my_profile');

  
        
    Route::get('/get-user-id/{token}', 'UserController@getUserId')->name('user.user.get_user_id');
    Route::get('/edit-my-profile', 'UserController@editMyProfile')->name('user.user.edit_my_profile');
    Route::get('/update-my-password', 'UserController@updateMyPassword')->name('user.user.update_my_password');
    Route::get('/change-my-image', 'UserController@changeMyImage')->name('user.user.change_my_image');
    Route::get('/checkout-shipping', 'UserController@checkoutShipping')->name('user.user.checkout_shipping');
    Route::get('/checkout-billing', 'UserController@checkoutBilling')->name('user.user.checkout_billing');
    
    
    

   

// });


############################Carts######################################
Route::group(['prefix'=>'carts'],function(){
    Route::post('/add-to-user-cart/{productAttrId}', 'CartsController@addToUserCart')->name('user.user.add_to_my_cart');
    Route::post('/edit-to-user-cart/{productAttrId}', 'CartsController@update')->name('user.user.edit_to_my_cart');
    Route::get('/get-user-cart', 'CartsController@getUserCart')->name('user.user.get_user_cart');
    Route::get('/delete-product-from-user-cart/{productAttrId}', 'CartsController@deleteProductFromUserCart')->name('user.user.delete_product_from_my_cart');

});

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
############################Orders######################################
Route::group(['prefix'=>'orders'],function(){
    Route::post('/get-user-orders', 'UserController@getuserOrders')->name('user.user.get_user_orders');
    Route::post('/add-to-user-order', 'UserController@addTouserOrder')->name('user.user.add_to_user_order');
    Route::post('/edit-user-order', 'UserController@EditUserOrder')->name('user.user.edit_user_order');
    Route::get('/view-all-user-orders-review', 'UserController@viewAlluserOrdersReview')->name('user.user.view_all_user_orders_review');
    Route::get('/order-review-details', 'UserController@orderReviewDetails')->name('user.user.order_review_details');
    Route::post('/delete-order', 'UserController@deleteOrder')->name('user.user.delete_order');
  
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