<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\widgets\Blog\LastPostsWidget;
use frontend\widgets\Shop\FeaturedProductsWidget;
use yii\helpers\Url;

//\frontend\assets\OwlCarouselAsset::register($this);

?>
<?php $this->beginContent('@frontend/views/layouts/main.php') ?>
<?php $this->title = 'Мебель в Самаре - купить мебель по ценам производителя! Жми'?>
<?php
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'Мебель в Самаре, купить мебель в Самаре, много мебели в Самаре, где купить мебель в самаре, интернет магазин мебели, мебельный магазин, хорошая мебель, цена мебель товар '
]);
$this->registerMetaTag([
    'name' => 'description',
    'content' => ' Купить хорошую мебель в Самаре в ассортименте от проверенных производителей. Гарантия качества, низкой цены на мебель из нашего каталога.'
]);
?>
    <header class="header-area sticky-bar header-padding-3 header-res-padding clearfix transparent-bar header-hm-7">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-4 col-2">
                    <div class="clickable-menu clickable-mainmenu-active">
                        <a href="#"><i class="pe-7s-menu"></i></a>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-4 col-5">
                    <div class="logo text-center logo-hm5">
                        <a class="sticky-none" href="index.html">
                            <img alt="" src="img/logo/logo-2.png">
                        </a>
                        <a class="sticky-block" href="index.html">
                            <img alt="" src="img/logo/logo.png">
                        </a>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-4 col-md-4 col-5">
                    <div class="header-right-wrap header-right-wrap-white">
                        <div class="same-style header-search">
                            <a class="search-active" href="#"><i class="pe-7s-search"></i></a>
                            <div class="search-content">
                                <form action="#">
                                    <input type="text" placeholder="Search" />
                                    <button class="button-search"><i class="pe-7s-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="same-style account-satting">
                            <a class="account-satting-active" href="#"><i class="pe-7s-user-female"></i></a>
                            <div class="account-dropdown">
                                <ul>
                                    <li><a href="login-register.html">Login</a></li>
                                    <li><a href="login-register.html">Register</a></li>
                                    <li><a href="wishlist.html">Wishlist  </a></li>
                                    <li><a href="my-account.html">my account</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="same-style header-wishlist">
                            <a href="wishlist.html"><i class="pe-7s-like"></i></a>
                        </div>
                        <div class="same-style cart-wrap">
                            <button class="icon-cart">
                                <i class="pe-7s-shopbag"></i>
                                <span class="count-style">02</span>
                            </button>
                            <div class="shopping-cart-content">
                                <ul>
                                    <li class="single-shopping-cart">
                                        <div class="shopping-cart-img">
                                            <a href="#"><img alt="" src="img/cart/cart-1.png"></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="#">T- Shart & Jeans </a></h4>
                                            <h6>Qty: 02</h6>
                                            <span>$260.00</span>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="fa fa-times-circle"></i></a>
                                        </div>
                                    </li>
                                    <li class="single-shopping-cart">
                                        <div class="shopping-cart-img">
                                            <a href="#"><img alt="" src="img/cart/cart-2.png"></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="#">T- Shart & Jeans </a></h4>
                                            <h6>Qty: 02</h6>
                                            <span>$260.00</span>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="fa fa-times-circle"></i></a>
                                        </div>
                                    </li>
                                </ul>
                                <div class="shopping-cart-total">
                                    <h4>Shipping : <span>$20.00</span></h4>
                                    <h4>Total : <span class="shop-total">$260.00</span></h4>
                                </div>
                                <div class="shopping-cart-btn btn-hover text-center">
                                    <a class="default-btn" href="cart-page.html">view cart</a>
                                    <a class="default-btn" href="checkout.html">checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="slider-area">
        <div class="slider-active-2 owl-carousel nav-style-3">
            <div class="slider-height-5 d-flex align-items-center bg-img" style="background-image:url(img/slider/slider-5.jpg);">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                            <div class="slider-content-6 slider-animated-1 text-center">
                                <h1 class="animated">Welcome to Flone</h1>
                                <p class="animated">30% off Summer Vacation</p>
                                <div class="slider-btn-5 btn-hover">
                                    <a class="animated" href="shop.html">SHOP NOW</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider-height-5 d-flex align-items-center bg-img" style="background-image:url(img/slider/slider-5-1.jpg);">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                            <div class="slider-content-6 slider-animated-1 text-center">
                                <h1 class="animated">Welcome to Flone</h1>
                                <p class="animated">30% off Summer Vacation</p>
                                <div class="slider-btn-5 btn-hover">
                                    <a class="animated" href="shop.html">SHOP NOW</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="welcome-area pt-95 pb-90">
        <div class="container">
            <div class="welcome-content text-center">
                <h5>Who Are We</h5>
                <h1>Welcome To Flone</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt labor et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commo consequat irure </p>
            </div>
        </div>
    </div>
    <div class="product-area pb-70">
        <div class="container">
            <div class="product-tab-list nav pb-55 text-center">
                <a href="#product-1" data-toggle="tab" >
                    <h4>New Arrivals  </h4>
                </a>
                <a class="active" href="#product-2" data-toggle="tab">
                    <h4>Best Sellers </h4>
                </a>
                <a href="#product-3" data-toggle="tab">
                    <h4>Sale Items</h4>
                </a>
            </div>
            <div class="tab-content jump">
                <div class="tab-pane" id="product-1">
                    <div class="row">
                        <div class="col-xl-3 col-md-6 col-lg-4 col-sm-6">
                            <div class="product-wrap mb-25 scroll-zoom">
                                <div class="product-img">
                                    <a href="product-details.html">
                                        <img class="default-img" src="img/product/pro-8.jpg" alt="">
                                        <img class="hover-img" src="img/product/pro-6.jpg" alt="">
                                    </a>
                                    <span class="pink">-10%</span>
                                    <div class="product-action">
                                        <div class="pro-same-action pro-wishlist">
                                            <a title="Wishlist" href="#"><i class="pe-7s-like"></i></a>
                                        </div>
                                        <div class="pro-same-action pro-cart">
                                            <a title="Add To Cart" href="#"><i class="pe-7s-cart"></i> Add to cart</a>
                                        </div>
                                        <div class="pro-same-action pro-quickview">
                                            <a title="Quick View" href="#" data-toggle="modal" data-target="#exampleModal"><i class="pe-7s-look"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content text-center">
                                    <h3><a href="product-details.html">T- Shirt And Jeans</a></h3>
                                    <div class="product-rating">
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="product-price">
                                        <span>$ 60.00</span>
                                        <span class="old">$ 60.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-lg-4 col-sm-6">
                            <div class="product-wrap mb-25 scroll-zoom">
                                <div class="product-img">
                                    <a href="product-details.html">
                                        <img class="default-img" src="img/product/pro-7.jpg" alt="">
                                        <img class="hover-img" src="img/product/pro-4-1.jpg" alt="">
                                    </a>
                                    <span class="purple">New</span>
                                    <div class="product-action">
                                        <div class="pro-same-action pro-wishlist">
                                            <a title="Wishlist" href="#"><i class="pe-7s-like"></i></a>
                                        </div>
                                        <div class="pro-same-action pro-cart">
                                            <a title="Add To Cart" href="#"><i class="pe-7s-cart"></i> Add to cart</a>
                                        </div>
                                        <div class="pro-same-action pro-quickview">
                                            <a title="Quick View" href="#" data-toggle="modal" data-target="#exampleModal"><i class="pe-7s-look"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content text-center">
                                    <h3><a href="product-details.html">T- Shirt And Jeans</a></h3>
                                    <div class="product-rating">
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="product-price">
                                        <span>$ 60.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-lg-4 col-sm-6">
                            <div class="product-wrap mb-25 scroll-zoom">
                                <div class="product-img">
                                    <a href="product-details.html">
                                        <img class="default-img" src="img/product/pro-6.jpg" alt="">
                                        <img class="hover-img" src="img/product/pro-6-1.jpg" alt="">
                                    </a>
                                    <span class="pink">-10%</span>
                                    <div class="product-action">
                                        <div class="pro-same-action pro-wishlist">
                                            <a title="Wishlist" href="#"><i class="pe-7s-like"></i></a>
                                        </div>
                                        <div class="pro-same-action pro-cart">
                                            <a title="Add To Cart" href="#"><i class="pe-7s-cart"></i> Add to cart</a>
                                        </div>
                                        <div class="pro-same-action pro-quickview">
                                            <a title="Quick View" href="#" data-toggle="modal" data-target="#exampleModal"><i class="pe-7s-look"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content text-center">
                                    <h3><a href="product-details.html">T- Shirt And Jeans</a></h3>
                                    <div class="product-rating">
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="product-price">
                                        <span>$ 60.00</span>
                                        <span class="old">$ 60.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-lg-4 col-sm-6">
                            <div class="product-wrap mb-25 scroll-zoom">
                                <div class="product-img">
                                    <a href="product-details.html">
                                        <img class="default-img" src="img/product/pro-5.jpg" alt="">
                                        <img class="hover-img" src="img/product/pro-5-1.jpg" alt="">
                                    </a>
                                    <span class="purple">New</span>
                                    <div class="product-action">
                                        <div class="pro-same-action pro-wishlist">
                                            <a title="Wishlist" href="#"><i class="pe-7s-like"></i></a>
                                        </div>
                                        <div class="pro-same-action pro-cart">
                                            <a title="Add To Cart" href="#"><i class="pe-7s-cart"></i> Add to cart</a>
                                        </div>
                                        <div class="pro-same-action pro-quickview">
                                            <a title="Quick View" href="#" data-toggle="modal" data-target="#exampleModal"><i class="pe-7s-look"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content text-center">
                                    <h3><a href="product-details.html">T- Shirt And Jeans</a></h3>
                                    <div class="product-rating">
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="product-price">
                                        <span>$ 60.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-lg-4 col-sm-6">
                            <div class="product-wrap mb-25 scroll-zoom">
                                <div class="product-img">
                                    <a href="product-details.html">
                                        <img class="default-img" src="img/product/pro-4.jpg" alt="">
                                        <img class="hover-img" src="img/product/pro-4-1.jpg" alt="">
                                    </a>
                                    <span class="pink">-10%</span>
                                    <div class="product-action">
                                        <div class="pro-same-action pro-wishlist">
                                            <a title="Wishlist" href="#"><i class="pe-7s-like"></i></a>
                                        </div>
                                        <div class="pro-same-action pro-cart">
                                            <a title="Add To Cart" href="#"><i class="pe-7s-cart"></i> Add to cart</a>
                                        </div>
                                        <div class="pro-same-action pro-quickview">
                                            <a title="Quick View" href="#" data-toggle="modal" data-target="#exampleModal"><i class="pe-7s-look"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content text-center">
                                    <h3><a href="product-details.html">T- Shirt And Jeans</a></h3>
                                    <div class="product-rating">
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="product-price">
                                        <span>$ 60.00</span>
                                        <span class="old">$ 60.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-lg-4 col-sm-6">
                            <div class="product-wrap mb-25 scroll-zoom">
                                <div class="product-img">
                                    <a href="product-details.html">
                                        <img class="default-img" src="img/product/pro-3.jpg" alt="">
                                        <img class="hover-img" src="img/product/pro-3-1.jpg" alt="">
                                    </a>
                                    <span class="purple">New</span>
                                    <div class="product-action">
                                        <div class="pro-same-action pro-wishlist">
                                            <a title="Wishlist" href="#"><i class="pe-7s-like"></i></a>
                                        </div>
                                        <div class="pro-same-action pro-cart">
                                            <a title="Add To Cart" href="#"><i class="pe-7s-cart"></i> Add to cart</a>
                                        </div>
                                        <div class="pro-same-action pro-quickview">
                                            <a title="Quick View" href="#" data-toggle="modal" data-target="#exampleModal"><i class="pe-7s-look"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content text-center">
                                    <h3><a href="product-details.html">T- Shirt And Jeans</a></h3>
                                    <div class="product-rating">
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="product-price">
                                        <span>$ 60.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-lg-4 col-sm-6">
                            <div class="product-wrap mb-25 scroll-zoom">
                                <div class="product-img">
                                    <a href="product-details.html">
                                        <img class="default-img" src="img/product/pro-2.jpg" alt="">
                                        <img class="hover-img" src="img/product/pro-2-1.jpg" alt="">
                                    </a>
                                    <span class="pink">-10%</span>
                                    <div class="product-action">
                                        <div class="pro-same-action pro-wishlist">
                                            <a title="Wishlist" href="#"><i class="pe-7s-like"></i></a>
                                        </div>
                                        <div class="pro-same-action pro-cart">
                                            <a title="Add To Cart" href="#"><i class="pe-7s-cart"></i> Add to cart</a>
                                        </div>
                                        <div class="pro-same-action pro-quickview">
                                            <a title="Quick View" href="#" data-toggle="modal" data-target="#exampleModal"><i class="pe-7s-look"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content text-center">
                                    <h3><a href="product-details.html">T- Shirt And Jeans</a></h3>
                                    <div class="product-rating">
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="product-price">
                                        <span>$ 60.00</span>
                                        <span class="old">$ 60.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-lg-4 col-sm-6">
                            <div class="product-wrap mb-25 scroll-zoom">
                                <div class="product-img">
                                    <a href="product-details.html">
                                        <img class="default-img" src="img/product/pro-1.jpg" alt="">
                                        <img class="hover-img" src="img/product/pro-1-1.jpg" alt="">
                                    </a>
                                    <span class="purple">New</span>
                                    <div class="product-action">
                                        <div class="pro-same-action pro-wishlist">
                                            <a title="Wishlist" href="#"><i class="pe-7s-like"></i></a>
                                        </div>
                                        <div class="pro-same-action pro-cart">
                                            <a title="Add To Cart" href="#"><i class="pe-7s-cart"></i> Add to cart</a>
                                        </div>
                                        <div class="pro-same-action pro-quickview">
                                            <a title="Quick View" href="#" data-toggle="modal" data-target="#exampleModal"><i class="pe-7s-look"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content text-center">
                                    <h3><a href="product-details.html">T- Shirt And Jeans</a></h3>
                                    <div class="product-rating">
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="product-price">
                                        <span>$ 60.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane active" id="product-2">
                    <div class="row">
                        <div class="col-xl-3 col-md-6 col-lg-4 col-sm-6">
                            <div class="product-wrap mb-25 scroll-zoom">
                                <div class="product-img">
                                    <a href="product-details.html">
                                        <img class="default-img" src="img/product/pro-1.jpg" alt="">
                                        <img class="hover-img" src="img/product/pro-1-1.jpg" alt="">
                                    </a>
                                    <span class="pink">-10%</span>
                                    <div class="product-action">
                                        <div class="pro-same-action pro-wishlist">
                                            <a title="Wishlist" href="#"><i class="pe-7s-like"></i></a>
                                        </div>
                                        <div class="pro-same-action pro-cart">
                                            <a title="Add To Cart" href="#"><i class="pe-7s-cart"></i> Add to cart</a>
                                        </div>
                                        <div class="pro-same-action pro-quickview">
                                            <a title="Quick View" href="#" data-toggle="modal" data-target="#exampleModal"><i class="pe-7s-look"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content text-center">
                                    <h3><a href="product-details.html">T- Shirt And Jeans</a></h3>
                                    <div class="product-rating">
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="product-price">
                                        <span>$ 60.00</span>
                                        <span class="old">$ 60.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-lg-4 col-sm-6">
                            <div class="product-wrap mb-25 scroll-zoom">
                                <div class="product-img">
                                    <a href="product-details.html">
                                        <img class="default-img" src="img/product/pro-2.jpg" alt="">
                                        <img class="hover-img" src="img/product/pro-2-1.jpg" alt="">
                                    </a>
                                    <span class="purple">New</span>
                                    <div class="product-action">
                                        <div class="pro-same-action pro-wishlist">
                                            <a title="Wishlist" href="#"><i class="pe-7s-like"></i></a>
                                        </div>
                                        <div class="pro-same-action pro-cart">
                                            <a title="Add To Cart" href="#"><i class="pe-7s-cart"></i> Add to cart</a>
                                        </div>
                                        <div class="pro-same-action pro-quickview">
                                            <a title="Quick View" href="#" data-toggle="modal" data-target="#exampleModal"><i class="pe-7s-look"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content text-center">
                                    <h3><a href="product-details.html">T- Shirt And Jeans</a></h3>
                                    <div class="product-rating">
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="product-price">
                                        <span>$ 60.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-lg-4 col-sm-6">
                            <div class="product-wrap mb-25 scroll-zoom">
                                <div class="product-img">
                                    <a href="product-details.html">
                                        <img class="default-img" src="img/product/pro-3.jpg" alt="">
                                        <img class="hover-img" src="img/product/pro-3-1.jpg" alt="">
                                    </a>
                                    <span class="pink">-10%</span>
                                    <div class="product-action">
                                        <div class="pro-same-action pro-wishlist">
                                            <a title="Wishlist" href="#"><i class="pe-7s-like"></i></a>
                                        </div>
                                        <div class="pro-same-action pro-cart">
                                            <a title="Add To Cart" href="#"><i class="pe-7s-cart"></i> Add to cart</a>
                                        </div>
                                        <div class="pro-same-action pro-quickview">
                                            <a title="Quick View" href="#" data-toggle="modal" data-target="#exampleModal"><i class="pe-7s-look"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content text-center">
                                    <h3><a href="product-details.html">T- Shirt And Jeans</a></h3>
                                    <div class="product-rating">
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="product-price">
                                        <span>$ 60.00</span>
                                        <span class="old">$ 60.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-lg-4 col-sm-6">
                            <div class="product-wrap mb-25 scroll-zoom">
                                <div class="product-img">
                                    <a href="product-details.html">
                                        <img class="default-img" src="img/product/pro-4.jpg" alt="">
                                        <img class="hover-img" src="img/product/pro-4-1.jpg" alt="">
                                    </a>
                                    <span class="purple">New</span>
                                    <div class="product-action">
                                        <div class="pro-same-action pro-wishlist">
                                            <a title="Wishlist" href="#"><i class="pe-7s-like"></i></a>
                                        </div>
                                        <div class="pro-same-action pro-cart">
                                            <a title="Add To Cart" href="#"><i class="pe-7s-cart"></i> Add to cart</a>
                                        </div>
                                        <div class="pro-same-action pro-quickview">
                                            <a title="Quick View" href="#" data-toggle="modal" data-target="#exampleModal"><i class="pe-7s-look"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content text-center">
                                    <h3><a href="product-details.html">T- Shirt And Jeans</a></h3>
                                    <div class="product-rating">
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="product-price">
                                        <span>$ 60.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-lg-4 col-sm-6">
                            <div class="product-wrap mb-25 scroll-zoom">
                                <div class="product-img">
                                    <a href="product-details.html">
                                        <img class="default-img" src="img/product/pro-5.jpg" alt="">
                                        <img class="hover-img" src="img/product/pro-5-1.jpg" alt="">
                                    </a>
                                    <span class="pink">-10%</span>
                                    <div class="product-action">
                                        <div class="pro-same-action pro-wishlist">
                                            <a title="Wishlist" href="#"><i class="pe-7s-like"></i></a>
                                        </div>
                                        <div class="pro-same-action pro-cart">
                                            <a title="Add To Cart" href="#"><i class="pe-7s-cart"></i> Add to cart</a>
                                        </div>
                                        <div class="pro-same-action pro-quickview">
                                            <a title="Quick View" href="#" data-toggle="modal" data-target="#exampleModal"><i class="pe-7s-look"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content text-center">
                                    <h3><a href="product-details.html">T- Shirt And Jeans</a></h3>
                                    <div class="product-rating">
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="product-price">
                                        <span>$ 60.00</span>
                                        <span class="old">$ 60.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-lg-4 col-sm-6">
                            <div class="product-wrap mb-25 scroll-zoom">
                                <div class="product-img">
                                    <a href="product-details.html">
                                        <img class="default-img" src="img/product/pro-6.jpg" alt="">
                                        <img class="hover-img" src="img/product/pro-6-1.jpg" alt="">
                                    </a>
                                    <span class="purple">New</span>
                                    <div class="product-action">
                                        <div class="pro-same-action pro-wishlist">
                                            <a title="Wishlist" href="#"><i class="pe-7s-like"></i></a>
                                        </div>
                                        <div class="pro-same-action pro-cart">
                                            <a title="Add To Cart" href="#"><i class="pe-7s-cart"></i> Add to cart</a>
                                        </div>
                                        <div class="pro-same-action pro-quickview">
                                            <a title="Quick View" href="#" data-toggle="modal" data-target="#exampleModal"><i class="pe-7s-look"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content text-center">
                                    <h3><a href="product-details.html">T- Shirt And Jeans</a></h3>
                                    <div class="product-rating">
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="product-price">
                                        <span>$ 60.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-lg-4 col-sm-6">
                            <div class="product-wrap mb-25 scroll-zoom">
                                <div class="product-img">
                                    <a href="product-details.html">
                                        <img class="default-img" src="img/product/pro-7.jpg" alt="">
                                        <img class="hover-img" src="img/product/pro-4-1.jpg" alt="">
                                    </a>
                                    <span class="pink">-10%</span>
                                    <div class="product-action">
                                        <div class="pro-same-action pro-wishlist">
                                            <a title="Wishlist" href="#"><i class="pe-7s-like"></i></a>
                                        </div>
                                        <div class="pro-same-action pro-cart">
                                            <a title="Add To Cart" href="#"><i class="pe-7s-cart"></i> Add to cart</a>
                                        </div>
                                        <div class="pro-same-action pro-quickview">
                                            <a title="Quick View" href="#" data-toggle="modal" data-target="#exampleModal"><i class="pe-7s-look"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content text-center">
                                    <h3><a href="product-details.html">T- Shirt And Jeans</a></h3>
                                    <div class="product-rating">
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="product-price">
                                        <span>$ 60.00</span>
                                        <span class="old">$ 60.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-lg-4 col-sm-6">
                            <div class="product-wrap mb-25 scroll-zoom">
                                <div class="product-img">
                                    <a href="product-details.html">
                                        <img class="default-img" src="img/product/pro-8.jpg" alt="">
                                        <img class="hover-img" src="img/product/pro-6.jpg" alt="">
                                    </a>
                                    <span class="purple">New</span>
                                    <div class="product-action">
                                        <div class="pro-same-action pro-wishlist">
                                            <a title="Wishlist" href="#"><i class="pe-7s-like"></i></a>
                                        </div>
                                        <div class="pro-same-action pro-cart">
                                            <a title="Add To Cart" href="#"><i class="pe-7s-cart"></i> Add to cart</a>
                                        </div>
                                        <div class="pro-same-action pro-quickview">
                                            <a title="Quick View" href="#" data-toggle="modal" data-target="#exampleModal"><i class="pe-7s-look"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content text-center">
                                    <h3><a href="product-details.html">T- Shirt And Jeans</a></h3>
                                    <div class="product-rating">
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="product-price">
                                        <span>$ 60.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="product-3">
                    <div class="row">
                        <div class="col-xl-3 col-md-6 col-lg-4 col-sm-6">
                            <div class="product-wrap mb-25 scroll-zoom">
                                <div class="product-img">
                                    <a href="product-details.html">
                                        <img class="default-img" src="img/product/pro-6.jpg" alt="">
                                        <img class="hover-img" src="img/product/pro-6-1.jpg" alt="">
                                    </a>
                                    <span class="pink">-10%</span>
                                    <div class="product-action">
                                        <div class="pro-same-action pro-wishlist">
                                            <a title="Wishlist" href="#"><i class="pe-7s-like"></i></a>
                                        </div>
                                        <div class="pro-same-action pro-cart">
                                            <a title="Add To Cart" href="#"><i class="pe-7s-cart"></i> Add to cart</a>
                                        </div>
                                        <div class="pro-same-action pro-quickview">
                                            <a title="Quick View" href="#" data-toggle="modal" data-target="#exampleModal"><i class="pe-7s-look"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content text-center">
                                    <h3><a href="product-details.html">T- Shirt And Jeans</a></h3>
                                    <div class="product-rating">
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="product-price">
                                        <span>$ 60.00</span>
                                        <span class="old">$ 60.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-lg-4 col-sm-6">
                            <div class="product-wrap mb-25 scroll-zoom">
                                <div class="product-img">
                                    <a href="product-details.html">
                                        <img class="default-img" src="img/product/pro-5.jpg" alt="">
                                        <img class="hover-img" src="img/product/pro-5-1.jpg" alt="">
                                    </a>
                                    <span class="purple">New</span>
                                    <div class="product-action">
                                        <div class="pro-same-action pro-wishlist">
                                            <a title="Wishlist" href="#"><i class="pe-7s-like"></i></a>
                                        </div>
                                        <div class="pro-same-action pro-cart">
                                            <a title="Add To Cart" href="#"><i class="pe-7s-cart"></i> Add to cart</a>
                                        </div>
                                        <div class="pro-same-action pro-quickview">
                                            <a title="Quick View" href="#" data-toggle="modal" data-target="#exampleModal"><i class="pe-7s-look"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content text-center">
                                    <h3><a href="product-details.html">T- Shirt And Jeans</a></h3>
                                    <div class="product-rating">
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="product-price">
                                        <span>$ 60.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-lg-4 col-sm-6">
                            <div class="product-wrap mb-25 scroll-zoom">
                                <div class="product-img">
                                    <a href="product-details.html">
                                        <img class="default-img" src="img/product/pro-4.jpg" alt="">
                                        <img class="hover-img" src="img/product/pro-4-1.jpg" alt="">
                                    </a>
                                    <span class="pink">-10%</span>
                                    <div class="product-action">
                                        <div class="pro-same-action pro-wishlist">
                                            <a title="Wishlist" href="#"><i class="pe-7s-like"></i></a>
                                        </div>
                                        <div class="pro-same-action pro-cart">
                                            <a title="Add To Cart" href="#"><i class="pe-7s-cart"></i> Add to cart</a>
                                        </div>
                                        <div class="pro-same-action pro-quickview">
                                            <a title="Quick View" href="#" data-toggle="modal" data-target="#exampleModal"><i class="pe-7s-look"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content text-center">
                                    <h3><a href="product-details.html">T- Shirt And Jeans</a></h3>
                                    <div class="product-rating">
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="product-price">
                                        <span>$ 60.00</span>
                                        <span class="old">$ 60.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-lg-4 col-sm-6">
                            <div class="product-wrap mb-25 scroll-zoom">
                                <div class="product-img">
                                    <a href="product-details.html">
                                        <img class="default-img" src="img/product/pro-3.jpg" alt="">
                                        <img class="hover-img" src="img/product/pro-3-1.jpg" alt="">
                                    </a>
                                    <span class="purple">New</span>
                                    <div class="product-action">
                                        <div class="pro-same-action pro-wishlist">
                                            <a title="Wishlist" href="#"><i class="pe-7s-like"></i></a>
                                        </div>
                                        <div class="pro-same-action pro-cart">
                                            <a title="Add To Cart" href="#"><i class="pe-7s-cart"></i> Add to cart</a>
                                        </div>
                                        <div class="pro-same-action pro-quickview">
                                            <a title="Quick View" href="#" data-toggle="modal" data-target="#exampleModal"><i class="pe-7s-look"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content text-center">
                                    <h3><a href="product-details.html">T- Shirt And Jeans</a></h3>
                                    <div class="product-rating">
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="product-price">
                                        <span>$ 60.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-lg-4 col-sm-6">
                            <div class="product-wrap mb-25 scroll-zoom">
                                <div class="product-img">
                                    <a href="product-details.html">
                                        <img class="default-img" src="img/product/pro-2.jpg" alt="">
                                        <img class="hover-img" src="img/product/pro-2-1.jpg" alt="">
                                    </a>
                                    <span class="pink">-10%</span>
                                </div>
                                <div class="product-content text-center">
                                    <h3><a href="product-details.html">T- Shirt And Jeans</a></h3>
                                    <div class="product-rating">
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="product-price">
                                        <span>$ 60.00</span>
                                        <span class="old">$ 60.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-lg-4 col-sm-6">
                            <div class="product-wrap mb-25 scroll-zoom">
                                <div class="product-img">
                                    <a href="product-details.html">
                                        <img class="default-img" src="img/product/pro-1.jpg" alt="">
                                        <img class="hover-img" src="img/product/pro-1-1.jpg" alt="">
                                    </a>
                                    <span class="purple">New</span>
                                    <div class="product-action">
                                        <div class="pro-same-action pro-wishlist">
                                            <a title="Wishlist" href="#"><i class="pe-7s-like"></i></a>
                                        </div>
                                        <div class="pro-same-action pro-cart">
                                            <a title="Add To Cart" href="#"><i class="pe-7s-cart"></i> Add to cart</a>
                                        </div>
                                        <div class="pro-same-action pro-quickview">
                                            <a title="Quick View" href="#" data-toggle="modal" data-target="#exampleModal"><i class="pe-7s-look"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content text-center">
                                    <h3><a href="product-details.html">T- Shirt And Jeans</a></h3>
                                    <div class="product-rating">
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="product-price">
                                        <span>$ 60.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-lg-4 col-sm-6">
                            <div class="product-wrap mb-25 scroll-zoom">
                                <div class="product-img">
                                    <a href="product-details.html">
                                        <img class="default-img" src="img/product/pro-8.jpg" alt="">
                                        <img class="hover-img" src="img/product/pro-6.jpg" alt="">
                                    </a>
                                    <span class="pink">-10%</span>
                                    <div class="product-action">
                                        <div class="pro-same-action pro-wishlist">
                                            <a title="Wishlist" href="#"><i class="pe-7s-like"></i></a>
                                        </div>
                                        <div class="pro-same-action pro-cart">
                                            <a title="Add To Cart" href="#"><i class="pe-7s-cart"></i> Add to cart</a>
                                        </div>
                                        <div class="pro-same-action pro-quickview">
                                            <a title="Quick View" href="#" data-toggle="modal" data-target="#exampleModal"><i class="pe-7s-look"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content text-center">
                                    <h3><a href="product-details.html">T- Shirt And Jeans</a></h3>
                                    <div class="product-rating">
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="product-price">
                                        <span>$ 60.00</span>
                                        <span class="old">$ 60.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-lg-4 col-sm-6">
                            <div class="product-wrap mb-25 scroll-zoom">
                                <div class="product-img">
                                    <a href="product-details.html">
                                        <img class="default-img" src="img/product/pro-7.jpg" alt="">
                                        <img class="hover-img" src="img/product/pro-4-1.jpg" alt="">
                                    </a>
                                    <span class="purple">New</span>
                                    <div class="product-action">
                                        <div class="pro-same-action pro-wishlist">
                                            <a title="Wishlist" href="#"><i class="pe-7s-like"></i></a>
                                        </div>
                                        <div class="pro-same-action pro-cart">
                                            <a title="Add To Cart" href="#"><i class="pe-7s-cart"></i> Add to cart</a>
                                        </div>
                                        <div class="pro-same-action pro-quickview">
                                            <a title="Quick View" href="#" data-toggle="modal" data-target="#exampleModal"><i class="pe-7s-look"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content text-center">
                                    <h3><a href="product-details.html">T- Shirt And Jeans</a></h3>
                                    <div class="product-rating">
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o yellow"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="product-price">
                                        <span>$ 60.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="subscribe-area-3 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 ml-auto mr-auto">
                    <div class="subscribe-style-3 text-center">
                        <h2>Subscribe </h2>
                        <p>Subscribe to our newsletter to receive news on update</p>
                        <div id="mc_embed_signup" class="subscribe-form-3 mt-35">
                            <form id="mc-embedded-subscribe-form" class="validate" novalidate="" target="_blank" name="mc-embedded-subscribe-form" method="post" action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef">
                                <div id="mc_embed_signup_scroll" class="mc-form">
                                    <input class="email" type="email" required="" placeholder="Youe Email Addres" name="EMAIL" value="">
                                    <div class="mc-news" aria-hidden="true">
                                        <input type="text" value="" tabindex="-1" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef">
                                    </div>
                                    <div class="clear-3">
                                        <input id="mc-embedded-subscribe" class="button" type="submit" name="subscribe" value="Subscribe">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="instagram-area">
        <div class="instagram-active owl-carousel">
            <div class="single-instagram">
                <a href="#"><img src="img/instagram/instagram-1.jpg" alt=""></a>
            </div>
            <div class="single-instagram">
                <a href="#"><img src="img/instagram/instagram-2.jpg" alt=""></a>
            </div>
            <div class="single-instagram">
                <a href="#"><img src="img/instagram/instagram-3.jpg" alt=""></a>
            </div>
            <div class="single-instagram">
                <a href="#"><img src="img/instagram/instagram-4.jpg" alt=""></a>
            </div>
            <div class="single-instagram">
                <a href="#"><img src="img/instagram/instagram-5.jpg" alt=""></a>
            </div>
            <div class="single-instagram">
                <a href="#"><img src="img/instagram/instagram-2.jpg" alt=""></a>
            </div>
        </div>
    </div>

    <div class="clickable-mainmenu">
        <div class="clickable-mainmenu-icon">
            <button class="clickable-mainmenu-close">
                <span class="pe-7s-close"></span>
            </button>
        </div>
        <div class="side-logo">
            <a href="index.html">
                <img alt="" src="img/logo/logo.png">
            </a>
        </div>
        <div id="menu" class="text-left clickable-menu-style">
            <ul>
            <?php //if ($this->beginCache('category_widget_home', ['duration' => 0])) : ?>
                <?=\frontend\widgets\Shop\CategoriesWidgetHome::widget()?>
            <?php //$this->endCache();?>
            <?php //endif;?>
                <li>
                    <a href="index.html">home</a>
                    <ul>
                        <li><a href="index.html">home version 1</a></li>
                        <li><a href="index-2.html">home version 2</a></li>
                        <li><a href="index-3.html">home version 3</a></li>
                        <li><a href="index-4.html">home version 4</a></li>
                        <li><a href="index-5.html">home version 5</a></li>
                        <li><a href="index-6.html">home version 6</a></li>
                        <li><a href="index-7.html">home version 7</a></li>
                        <li><a href="index-8.html">home version 8</a></li>
                        <li><a href="index-9.html">home version 9</a></li>
                        <li><a href="index-10.html">home version 10</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">shop</a>
                    <ul>
                        <li>
                            <a href="#">shop grid</a>
                            <ul>
                                <li><a href="shop.html">standard style</a></li>
                                <li><a href="shop-filter.html">Grid filter style</a></li>
                                <li><a href="shop-grid-2-col.html">Grid 2 column</a></li>
                                <li><a href="shop-no-sidebar.html">Grid No sidebar</a></li>
                                <li><a href="shop-grid-fw.html">Grid full wide </a></li>
                                <li><a href="shop-right-sidebar.html">Grid right sidebar</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">shop list</a>
                            <ul>
                                <li><a href="shop-list.html">list 1 column box </a></li>
                                <li><a href="shop-list-fw.html">list 1 column full wide </a></li>
                                <li><a href="shop-list-fw-2col.html">list 2 column  full wide</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">product details</a>
                    <ul>
                        <li><a href="product-details.html">tab style 1</a></li>
                        <li><a href="product-details-2.html">tab style 2</a></li>
                        <li><a href="product-details-3.html">tab style 3</a></li>
                        <li><a href="product-details-4.html">sticky style</a></li>
                        <li><a href="product-details-5.html">gallery style </a></li>
                        <li><a href="product-details-slider-box.html">Slider style</a></li>
                        <li><a href="product-details-affiliate.html">affiliate style</a></li>
                        <li><a href="product-details-6.html">fixed image style </a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">pages</a>
                    <ul>
                        <li><a href="about.html">about us</a></li>
                        <li><a href="cart-page.html">cart page</a></li>
                        <li><a href="checkout.html">checkout </a></li>
                        <li><a href="wishlist.html">wishlist </a></li>
                        <li><a href="my-account.html">my account</a></li>
                        <li><a href="login-register.html">login / register </a></li>
                        <li><a href="contact.html">contact us </a></li>
                    </ul>
                </li>
                <li>
                    <a href="blog.html">blog</a>
                    <ul>
                        <li><a href="blog.html">blog standard</a></li>
                        <li><a href="blog-no-sidebar.html">blog no sidebar</a></li>
                        <li><a href="blog-right-sidebar.html">blog right sidebar</a></li>
                        <li><a href="blog-details.html">blog details 1</a></li>
                        <li><a href="blog-details-2.html">blog details 2</a></li>
                        <li><a href="blog-details-3.html">blog details 3</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">About Us</a>
                </li>
                <li>
                    <a href="#">Contact Us</a>
                </li>
            </ul>
        </div>
        <div class="side-social">
            <ul>
                <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
                <li><a class="pinterest" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
        </div>
    </div>

<?php $this->endContent() ?>