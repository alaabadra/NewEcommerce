<template>
  <div>
      <v-snackbar v-model="snackbar" :color="color">
      {{ text }}

      <template v-slot:action="{ attrs }">
        <v-btn color="pink" text v-bind="attrs" @click="snackbar = false">
          Close
        </v-btn>
      </template>
    </v-snackbar>
    <head>
      <!-- <meta charset="UTF-8" />
      <meta name="description" content="Ogani Template" />
      <meta name="keywords" content="Ogani, unica, creative, html" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta http-equiv="X-UA-Compatible" content="ie=edge" />
      <title>Ogani | Template</title> -->

      <!-- Google Font -->
      <!-- <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap"
        rel="stylesheet"
      /> -->

      <!-- Css Styles -->
      <!-- <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" type="text/css" />
      <link rel="stylesheet" href="../../assets/css/font-awesome.min.css" type="text/css" />
      <link rel="stylesheet" href="../../assets/css/elegant-icons.css" type="text/css" />
      <link rel="stylesheet" href="../../assets/css/nice-select.css" type="text/css" />
      <link rel="stylesheet" href="../../assets/css/jquery-ui.min.css" type="text/css" />
      <link rel="stylesheet" href="../../assets/css/owl.carousel.min.css" type="text/css" />
      <link rel="stylesheet" href="../../assets/css/slicknav.min.css" type="text/css" />
      <link rel="stylesheet" href="../../assets/css/style.css" type="text/css" /> -->
    </head>

    <!-- Page Preloder -->
    <!-- <div id="preloder">
      <div class="loader"></div>
    </div>-->

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
      <div class="humberger__menu__logo">
        <a href="#"><img src="../../assets/img/logo.png" alt=""/></a>
      </div>
      <div class="humberger__menu__cart">
        <ul>
          <li>
            <a href="#"><i class="fa fa-heart"></i> <span>1</span></a>
          </li>
          <li>
            <a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a>
          </li>
        </ul>
        <div class="header__cart__price">item: <span>$150.00</span></div>
      </div>
      <div class="humberger__menu__widget">
        <div class="header__top__right__language">
          <img src="../../assets/img/language.png" alt="" />
          <div>English</div>
          <span class="arrow_carrot-down"></span>
          <ul>
            <li><a href="#">Spanis</a></li>
            <li><a href="#">English</a></li>
          </ul>
        </div>
        <div class="header__top__right__auth">
          <a href="#"><i class="fa fa-user"></i> Login</a>
        </div>
      </div>
      <nav class="humberger__menu__nav mobile-menu">
        <ul>
          <li class="active"><a href="./index.html">Home</a></li>
          <li><a href="./shop-grid.html">Shop</a></li>
          <li>
            <a href="#">Pages</a>
            <ul class="header__menu__dropdown">
              <li><a href="./shop-details.html">Shop Details</a></li>
              <li><a href="./shoping-cart.html">Shoping Cart</a></li>
              <li><a href="./checkout.html">Check Out</a></li>
              <li><a href="./blog-details.html">Blog Details</a></li>
            </ul>
          </li>
          <li><a href="./blog.html">Blog</a></li>
          <li><a href="./contact.html">Contact</a></li>
        </ul>
      </nav>
      <div id="mobile-menu-wrap"></div>
      <div class="header__top__right__social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-pinterest-p"></i></a>
      </div>
      <div class="humberger__menu__contact">
        <ul>
          <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
          <li>Free Shipping for all Order of $99</li>
        </ul>
      </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
      <div class="header__top">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-md-6">
              <div class="header__top__left">
                <ul>
                  <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                  <li>Free Shipping for all Order of $99</li>
                </ul>
              </div>
            </div>
            <div class="col-lg-6 col-md-6">
              <div class="header__top__right">
                <div class="header__top__right__social">
                  <a href="#"><i class="fa fa-facebook"></i></a>
                  <a href="#"><i class="fa fa-twitter"></i></a>
                  <a href="#"><i class="fa fa-linkedin"></i></a>
                  <a href="#"><i class="fa fa-pinterest-p"></i></a>
                </div>
                <div class="header__top__right__language">
                  <img src="../../assets/img/language.png" alt="" />
                  <div>English</div>
                  <span class="arrow_carrot-down"></span>
                  <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                  </ul>
                </div>
                <div class="header__top__right__auth">
                  <a href="#"><i class="fa fa-user"></i> Login</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <div class="header__logo">
              <a href="./index.html"><img src="img/logo.png" alt=""/></a>
            </div>
          </div>
          <div class="col-lg-6">
            <nav class="header__menu">
              <ul>
                <li class="active"><a href="./index.html">Home</a></li>
                <li><a href="./shop-grid.html">Shop</a></li>
                <li>
                  <a href="#">Pages</a>
                  <ul class="header__menu__dropdown">
                    <li><a href="./shop-details.html">Shop Details</a></li>
                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                    <li><a href="./checkout.html">Check Out</a></li>
                    <li><a href="./blog-details.html">Blog Details</a></li>
                  </ul>
                </li>
                <li><a href="./blog.html">Blog</a></li>
                <li><a href="./contact.html">Contact</a></li>
              </ul>
            </nav>
          </div>
          <div class="col-lg-3">
            <div class="header__cart">
              <ul>
                <li>
                  <a href="#"><i class="fa fa-heart"></i> <span>1</span></a>
                </li>
                <li style="margin-right: 143px;">
                  <router-link to="/cart">
                    <i class="fa fa-shopping-bag"></i> <span>3</span> </router-link
                  >
                </li>
              </ul>
              <div class="header__cart__price">item: <span>$150.00</span></div>
            </div>
          </div>
        </div>
        <div class="humberger__open">
          <i class="fa fa-bars"></i>
        </div> 
      </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <div class="hero__categories">
              <div class="hero__categories__all">
                <i class="fa fa-bars"></i>
                <span>All departments</span>
              </div>
              <ul>
                <li><a href="#">Fresh Meat</a></li>
                <li><a href="#">Vegetables</a></li>
                <li><a href="#">Fruit & Nut Gifts</a></li>
                <li><a href="#">Fresh Berries</a></li>
                <li><a href="#">Ocean Foods</a></li>
                <li><a href="#">Butter & Eggs</a></li>
                <li><a href="#">Fastfood</a></li>
                <li><a href="#">Fresh Onion</a></li>
                <li><a href="#">Papayaya & Crisps</a></li>
                <li><a href="#">Oatmeal</a></li>
                <li><a href="#">Fresh Bananas</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-9">
            <div class="hero__search">
              <div class="hero__search__form">
                <form action="#">
                  <div class="hero__search__categories">
                    All Categories
                    <span class="arrow_carrot-down"></span>
                  </div>
                  <input type="text" placeholder="What do yo u need?" />
                  <button type="submit" class="site-btn">SEARCH</button>
                </form>
              </div>
              <div class="hero__search__phone">
                <div class="hero__search__phone__icon">
                  <i class="fa fa-phone"></i>
                </div>
                <div class="hero__search__phone__text">
                  <h5>+65 11.188.888</h5>
                  <span>support 24/7 time</span>
                </div>
              </div>
            </div>
            <div class="hero__item set-bg" data-setbg="img/hero/banner.jpg">
              <div class="hero__text">
                <span>FRUIT FRESH</span>
                <h2>Vegetable <br />100% Organic</h2>
                <p>Free Pickup and Delivery Available</p>
                <a href="#" class="primary-btn">SHOP NOW</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
      <div class="container">
        <div class="row">
          <div class="categories__slider owl-carousel">
            <div class="col-lg-3">
              <div
                class="categories__item set-bg"
                data-setbg="../../assets/img/categories/cat-1.jpg"
              >
                <h5><a href="#">Fresh Fruit</a></h5>
              </div>
            </div>
            <div class="col-lg-3">
              <div
                class="categories__item set-bg"
                data-setbg="../../assets/img/categories/cat-2.jpg"
              >
                <h5><a href="#">Dried Fruit</a></h5>
              </div>
            </div>
            <div class="col-lg-3">
              <div
                class="categories__item set-bg"
                data-setbg="../../assets/img/categories/cat-3.jpg"
              >
                <h5><a href="#">Vegetables</a></h5>
              </div>
            </div>
            <div class="col-lg-3">
              <div
                class="categories__item set-bg"
                data-setbg="../../assets/img/categories/cat-4.jpg"
              >
                <h5><a href="#">drink fruits</a></h5>
              </div>
            </div>
            <div class="col-lg-3">
              <div
                class="categories__item set-bg"
                data-setbg="../../assets/img/categories/cat-5.jpg"
              >
                <h5><a href="#">drink fruits</a></h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Categories Section End -->


    <!-- Banner Begin -->
    <div class="banner">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="banner__pic">
              <img src="../../assets/img/banner/banner-1.jpg" alt="" />
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="banner__pic">
              <img src="../../assets/img/banner/banner-2.jpg" alt="" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".oranges">Oranges</li>
                            <li data-filter=".fresh-meat">Fresh Meat</li>
                            <li data-filter=".vegetables">Vegetables</li>
                            <li data-filter=".fastfood">Fastfood</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat" v-for="product in productsFeature" :key="product.id">
                    <div class="featured__item">

                        <div class="featured__item__text">
                                            <div class="latest-product__item__pic">
                      <img
                        src="../../assets/img/latest-product/lp-1.jpg"
                        alt=""
                      />
                    </div>
                            <h6><a href="#">{{product.product_attr_name}}</a></h6>
                            <h5>${{product.product_attr_price}}</h5>
                        </div>
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a @click="addToCartDialog(product.id)"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>

                    </div>
                </div>
                
                 
            </div>
        </div>
            <v-dialog v-model="addToCartShowDialog" width="600">
      <v-card>
        <v-card-title> enter your qty to increase into your cart</v-card-title>
        <div class="row">
          <v-text-field
            class="col-sm-5 mr-auto"
            outlined
            dense
            label="كمية المنتج"
            type="number"
            v-model="editedItem.qty"
          >
          </v-text-field>

          <div class="col-sm-9 mx-auto"></div>
          <div class="col-sm-5 mx-auto row">
            <v-tooltip top>
              <template v-slot:activator="{ on, attrs }">
                <v-btn
                  fab
                  v-bind="attrs"
                  v-on="on"
                  size="24"
                  class="mx-auto"
                  color="blue darken-3"
                  dark
                  @click="addToCart()"
                >
                  <v-icon>mdi-content-save-all</v-icon>
                </v-btn>
              </template>
              <span>حفظ</span>
            </v-tooltip>
            <v-tooltip top>
              <template v-slot:activator="{ on, attrs }">
                <v-btn
                  fab
                  v-bind="attrs"
                  v-on="on"
                  size="24"
                  class="mx-auto"
                  color="amber darken-3"
                  dark
                  @click="closeincDialog()"
                >
                  <v-icon>mdi-reply-all</v-icon>
                </v-btn>
              </template>
              <span>رجوع</span>
            </v-tooltip>
          </div>
        </div>
        <v-tooltip top>
          <template v-slot:activator="{ on, attrs }">
            <v-btn
              fab
              v-bind="attrs"
              v-on="on"
              size="24"
              class="mx-auto"
              color="amber darken-3"
              dark
              @click="closeincDialog()"
            >
              <v-icon>mdi-reply-all</v-icon>
            </v-btn>
          </template>
          <span>رجوع</span>
        </v-tooltip>
      </v-card>
    </v-dialog>
    </section>
    <!-- Featured Section End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="latest-product__text">
              <h4>Latest Products</h4>
              <div class="latest-product__slider owl-carousel">
                <div class="latest-prdouct__slider__item">
                  <a href="#" class="latest-product__item">
                    <div class="latest-product__item__pic">
                      <img
                        src="../../assets/img/latest-product/lp-1.jpg"
                        alt=""
                      />
                    </div>
                    <div class="latest-product__item__text">
                      <h6>Crab Pool Security</h6>
                      <span>$30.00</span>
                    </div>
                  </a>
                  <a href="#" class="latest-product__item">
                    <div class="latest-product__item__pic">
                      <img
                        src="../../assets/img/latest-product/lp-2.jpg"
                        alt=""
                      />
                    </div>
                    <div class="latest-product__item__text">
                      <h6>Crab Pool Security</h6>
                      <span>$30.00</span>
                    </div>
                  </a>
                  <a href="#" class="latest-product__item">
                    <div class="latest-product__item__pic">
                      <img
                        src="../../assets/img/latest-product/lp-3.jpg"
                        alt=""
                      />
                    </div>
                    <div class="latest-product__item__text">
                      <h6>Crab Pool Security</h6>
                      <span>$30.00</span>
                    </div>
                  </a>
                </div>
                <div class="latest-prdouct__slider__item">
                  <a href="#" class="latest-product__item">
                    <div class="latest-product__item__pic">
                      <img
                        src="../../assets/img/latest-product/lp-1.jpg"
                        alt=""
                      />
                    </div>
                    <div class="latest-product__item__text">
                      <h6>Crab Pool Security</h6>
                      <span>$30.00</span>
                    </div>
                  </a>
                  <a href="#" class="latest-product__item">
                    <div class="latest-product__item__pic">
                      <img
                        src="../../assets/img/latest-product/lp-2.jpg"
                        alt=""
                      />
                    </div>
                    <div class="latest-product__item__text">
                      <h6>Crab Pool Security</h6>
                      <span>$30.00</span>
                    </div>
                  </a>
                  <a href="#" class="latest-product__item">
                    <div class="latest-product__item__pic">
                      <img
                        src="../../assets/img/latest-product/lp-3.jpg"
                        alt=""
                      />
                    </div>
                    <div class="latest-product__item__text">
                      <h6>Crab Pool Security</h6>
                      <span>$30.00</span>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="latest-product__text">
              <h4>Top Rated Products</h4>
              <div class="latest-product__slider owl-carousel">
                <div class="latest-prdouct__slider__item">
                  <a href="#" class="latest-product__item">
                    <div class="latest-product__item__pic">
                      <img
                        src="../../assets/img/latest-product/lp-1.jpg"
                        alt=""
                      />
                    </div>
                    <div class="latest-product__item__text">
                      <h6>Crab Pool Security</h6>
                      <span>$30.00</span>
                    </div>
                  </a>
                  <a href="#" class="latest-product__item">
                    <div class="latest-product__item__pic">
                      <img
                        src="../../assets/img/latest-product/lp-2.jpg"
                        alt=""
                      />
                    </div>
                    <div class="latest-product__item__text">
                      <h6>Crab Pool Security</h6>
                      <span>$30.00</span>
                    </div>
                  </a>
                  <a href="#" class="latest-product__item">
                    <div class="latest-product__item__pic">
                      <img
                        src="../../assets/img/latest-product/lp-3.jpg"
                        alt=""
                      />
                    </div>
                    <div class="latest-product__item__text">
                      <h6>Crab Pool Security</h6>
                      <span>$30.00</span>
                    </div>
                  </a>
                </div>
                <div class="latest-prdouct__slider__item">
                  <a href="#" class="latest-product__item">
                    <div class="latest-product__item__pic">
                      <img
                        src="../../assets/img/latest-product/lp-1.jpg"
                        alt=""
                      />
                    </div>
                    <div class="latest-product__item__text">
                      <h6>Crab Pool Security</h6>
                      <span>$30.00</span>
                    </div>
                  </a>
                  <a href="#" class="latest-product__item">
                    <div class="latest-product__item__pic">
                      <img
                        src="../../assets/img/latest-product/lp-2.jpg"
                        alt=""
                      />
                    </div>
                    <div class="latest-product__item__text">
                      <h6>Crab Pool Security</h6>
                      <span>$30.00</span>
                    </div>
                  </a>
                  <a href="#" class="latest-product__item">
                    <div class="latest-product__item__pic">
                      <img
                        src="../../assets/img/latest-product/lp-3.jpg"
                        alt=""
                      />
                    </div>
                    <div class="latest-product__item__text">
                      <h6>Crab Pool Security</h6>
                      <span>$30.00</span>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="latest-product__text">
              <h4>Review Products</h4>
              <div class="latest-product__slider owl-carousel">
                <div class="latest-prdouct__slider__item">
                  <a href="#" class="latest-product__item">
                    <div class="latest-product__item__pic">
                      <img
                        src="../../assets/img/latest-product/lp-1.jpg"
                        alt=""
                      />
                    </div>
                    <div class="latest-product__item__text">
                      <h6>Crab Pool Security</h6>
                      <span>$30.00</span>
                    </div>
                  </a>
                  <a href="#" class="latest-product__item">
                    <div class="latest-product__item__pic">
                      <img
                        src="../../assets/img/latest-product/lp-2.jpg"
                        alt=""
                      />
                    </div>
                    <div class="latest-product__item__text">
                      <h6>Crab Pool Security</h6>
                      <span>$30.00</span>
                    </div>
                  </a>
                  <a href="#" class="latest-product__item">
                    <div class="latest-product__item__pic">
                      <img
                        src="../../assets/img/latest-product/lp-3.jpg"
                        alt=""
                      />
                    </div>
                    <div class="latest-product__item__text">
                      <h6>Crab Pool Security</h6>
                      <span>$30.00</span>
                    </div>
                  </a>
                </div>
                <div class="latest-prdouct__slider__item">
                  <a href="#" class="latest-product__item">
                    <div class="latest-product__item__pic">
                      <img
                        src="../../assets/img/latest-product/lp-1.jpg"
                        alt=""
                      />
                    </div>
                    <div class="latest-product__item__text">
                      <h6>Crab Pool Security</h6>
                      <span>$30.00</span>
                    </div>
                  </a>
                  <a href="#" class="latest-product__item">
                    <div class="latest-product__item__pic">
                      <img
                        src="../../assets/img/latest-product/lp-2.jpg"
                        alt=""
                      />
                    </div>
                    <div class="latest-product__item__text">
                      <h6>Crab Pool Security</h6>
                      <span>$30.00</span>
                    </div>
                  </a>
                  <a href="#" class="latest-product__item">
                    <div class="latest-product__item__pic">
                      <img
                        src="../../assets/img/latest-product/lp-3.jpg"
                        alt=""
                      />
                    </div>
                    <div class="latest-product__item__text">
                      <h6>Crab Pool Security</h6>
                      <span>$30.00</span>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    <section class="from-blog spad">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="section-title from-blog__title">
              <h2>From The Blog</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="blog__item">
              <div class="blog__item__pic">
                <img src="../../assets/img/blog/blog-1.jpg" alt="" />
              </div>
              <div class="blog__item__text">
                <ul>
                  <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                  <li><i class="fa fa-comment-o"></i> 5</li>
                </ul>
                <h5><a href="#">Cooking tips make cooking simple</a></h5>
                <p>
                  Sed quia non numquam modi tempora indunt ut labore et dolore
                  magnam aliquam quaerat
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="blog__item">
              <div class="blog__item__pic">
                <img src="../../assets/img/blog/blog-2.jpg" alt="" />
              </div>
              <div class="blog__item__text">
                <ul>
                  <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                  <li><i class="fa fa-comment-o"></i> 5</li>
                </ul>
                <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                <p>
                  Sed quia non numquam modi tempora indunt ut labore et dolore
                  magnam aliquam quaerat
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="blog__item">
              <div class="blog__item__pic">
                <img src="../../assets/img/blog/blog-3.jpg" alt="" />
              </div>
              <div class="blog__item__text">
                <ul>
                  <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                  <li><i class="fa fa-comment-o"></i> 5</li>
                </ul>
                <h5><a href="#">Visit the clean farm in the US</a></h5>
                <p>
                  Sed quia non numquam modi tempora indunt ut labore et dolore
                  magnam aliquam quaerat
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Blog Section End -->
  </div>
</template>

<script>
let $ = require("../../assets/js/jquery-3.3.1.min.js");
import "../../assets/js/bootstrap.min.js";
// import "../../assets/js/jquery.nice-select.min.js";
// import "../../assets/js/jquery-ui.min.js";
// import "../../assets/js/jquery.slicknav.js";
// import "../../assets/js/mixitup.min.js";
// import "../../assets/js/owl.carousel.min.js";
import "../../assets/js/main.js";
import "../../assets/css/bootstrap.min.css";
import "../../assets/css/font-awesome.min.css";
import "../../assets/css/elegant-icons.css";
import "../../assets/css/nice-select.css";
// import "../../assets/css/jquery-ui.min.css";
// import "../../assets/css/owl.carousel.min.css";
import "../../assets/css/slicknav.min.css";
import "../../assets/css/style.css";
import axios from 'axios'
export default {
    data: () => {
    return {
      snackbar: false,
      text: null,
      color: null,
      ErrorBool: false,
      SuccessBool: false,
      Errors: [],
      Success: [],
      ErrorMessage: {
        "500": "Occured Error in server side to show Result Data ! Try again",
        "404": "Somthing Not Found In Result Data ! Try again",
        "400": "You Can not make this , try again in your entering ",
        "401": "You UnAuthorized to see Result Data ! Login ,pls",
        "405": "Somthing Not Allow to show Result Data ! Try again",
        "419": "Somthing Unknown In Result Data ! Try again",
        "No Data In Your Entering":
          "There is No Data in Your DataBase to show it",
        "No Data To Show It":
          "There is No Data in Something in Show The Result",
        "No Data Tasks": "There is No Tasks For This User to  Show it",
        "No Data Events": "There is No Event For This User to  Show it",
        Else: "Occured Somthing Error  to show Result Data ! Try again",
      },

      productsFeature:[],
            headers: [ 
{
          text: "الاسم",
          align: "start",
          sortable: true,
          value: "product_attr_name",
        },
        { text: "الصورة", value: "product_attr_image" },
        { text: "السعر", value: "product_attr_price" },
        { text: "الكمية", value: "product_attr_quantity" },
        { text: "الاسم", value: "product_attr_name" },
        { text: "الحالة", value: "product_attr_status" },
        { text: "تعديل وحذف", value: "actions", sortable: false },
      ],
      search: null,
      overlay:false,
      addToCartShowDialog:false,
      editedItem:{
        id: null,
        name: null, qty: null,
        prodId:null
      }
    }
    },
computed: {
    formTitle() {
      return this.editedIndex === -1 ? "New Item" : "Edit Item";
    },
  },
  watch: {
        Errors(val) {
      this.snackbar = true;
      this.color = "red darken-1";
      val.forEach((item) => {
        this.text = this.getError(item);
      });
    },
    Success(val) {
      this.snackbar = true;
      this.color = "green darken-1";
      val.forEach((item) => {
        this.text = this.getError(item);
      });
    },
    dialog(val) {
      val || this.close();
    },
  },
  created(){
	  this.initialize()
  },
  methods: {
        getError(id) {
      if (this.ErrorMessage.hasOwnProperty(id)) return this.ErrorMessage[id];
    },
    callSuccessMessage(msg) {
      this.Success = [];
      return this.Success.push(msg);
    },
    noDataInYourEntering() {
      this.Errors = [];
      (this.ErrorBool = true),
        this.Errors.push("No Data In Your Entering"),
        () =>
          setTimeout(() => {
            this.ErrorBool = false;
          }, 3000);
    },
    noDataInSomethingResult() {
      this.Errors = [];
      (this.ErrorBool = true),
        this.Errors.push("No Data To Show It"),
        () =>
          setTimeout(() => {
            this.ErrorBool = false;
          }, 3000);
    },
    callErrorMessage(statusErr) {
      if (
        statusErr == 404 ||
        statusErr == 401 ||
        statusErr == 500 ||
        statusErr == 419 ||
        statusErr == 400 ||
        statusErr == 405
      ) {
        this.Errors = [];
        this.Errors.push(statusErr);
      } else {
        this.Errors = [];
        this.Errors.push("Else");
      }
    },
        addToCartDialog(itemId) {
          this.editedItem.prodId=itemId;
          this.addToCartShowDialog=true;
          this.overlay=true;

    },
    addToCart(){
      axios
        .post(
          `http://127.0.0.1:8000/api/user/carts/add-to-cart-user/${this.editedItem.prodId}`,
          {
            quantityProductInCartUser: this.editedItem.qty,
          }
        )
                .then((res) => {
          if (res.data.status == 404) {
            this.noDataInSomethingResult();
          } else if (res.data.status == 401) {
            this.callErrorMessage(res.data.status);
          } else if (res.data.status == 400) {
            this.callErrorMessage(res.data.status);
          } else {
            if (res.data.length != 0) {
                this.callSuccessMessage(res.data.data);

      
            } else {
              this.noDataInYourEntering();
            }
          }
        })
        .catch((err) => {
          if (err.response) {
            this.callErrorMessage(err.response.status);
          } else {
            this.callErrorMessage("Else");
          }
        });
    },
    getColor(status) {
      if (status == "غير متوفرة" || status == "Not Available") return "red";
      else if (status == "متوفرة" || status == "Available") return "green";
    },
    initialize() {
      this.addToCartShowDialog=false;
      this.overlay=false;
            axios
        .get('http://127.0.0.1:8000/api/user/get-the-best-products') 
        .then((res) => { 
          this.productsFeature = res.data.data.data;
        });

    },

    editItem(item) {
      this.editedIndex = this.categories.indexOf(item);
      this.editedItem = Object.assign({}, item);
      this.dialog = true;
    },

    deleteItem(item) {
      const index = this.categories.indexOf(item);
      confirm("هل أنت متأكدأنك تريح مسح هذا العنصر!") &&
        this.categories.splice(index, 1);
    },

    close() {
      this.dialog = false;
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem);
        this.editedIndex = -1;
      });
    },

  },


};
</script>
<style></style>
