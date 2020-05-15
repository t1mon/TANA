<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\widgets\Blog\LastPostsWidget;
use frontend\widgets\Shop\FeaturedProductsWidget;
use yii\helpers\Url;

//\frontend\assets\OwlCarouselAsset::register($this);

?>
<?php $this->beginContent('@frontend/views/layouts/main.php') ?>
<?php $this->title = 'ТРИКОТАЖ НОСКИ КОЛГОТКИ ОПТОМ'?>
<?php
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'трикотаж по фабричным ценам, оптом от производителя, тана трикотаж оптом в самаре, трикотаж оптом, носки оптом, колготки оптом, оптом без размеров, детский трикотаж, женский трикотаж мужской трикотаж, чулочно-носочные изделия'
]);
$this->registerMetaTag([
    'name' => 'description',
    'content' => 'У нас большой ассортимент трикотажный и чулочно-носочных изделий! Оптовые продажи без размерных рядов Российских производителей. Более 4 000 моделей в наличии для всей семьи, по фабричным ценам. Новинки каждую неделю.'
]);
?>
    <header class="header-area sticky-bar header-padding-3 header-res-padding clearfix transparent-bar header-hm-7">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-4 col-2">
                    <div class="clickable-menu clickable-mainmenu-active">
                        <a href="#"><i class="pe-7s-menu"></i>МЕНЮ</a>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-4 col-5">
                    <div class="logo text-center logo-hm5">
                        <a class="sticky-none" href="<?=Url::home()?>">
                            <img class="img-fluid" alt="" src="/img/logo/logo.png">
                        </a>
                        <a class="sticky-block" href="<?=Url::home()?>">
                            <img class="img-fluid" alt="" src="/img/logo/logo.png">
                        </a>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-4 col-md-4 col-5">
                    <div class="header-right-wrap header-right-wrap-white">
                        <div class="same-style header-search">
                            <a class="search-active" href="#"><i class="pe-7s-search"></i></a>
                            <div class="search-content">
                                <?= \yii\helpers\Html::beginForm(['/shop/catalog/search'], 'get') ?>
                                <input type="text" name="text" placeholder="Поиск" />
                                <button class="button-search"><i class="pe-7s-search"></i></button>
                                <?= \yii\helpers\Html::endForm() ?>
                            </div>
                        </div>
                        <!--                        <div class="same-style account-satting">-->
                        <!--                            <a class="account-satting-active" href="#"><i class="pe-7s-user-female"></i></a>-->
                        <!--                            <div class="account-dropdown">-->
                        <!--                                <ul>-->
                        <!--                                    <li><a href="login-register.html">Login</a></li>-->
                        <!--                                    <li><a href="login-register.html">Register</a></li>-->
                        <!--                                    <li><a href="wishlist.html">Wishlist  </a></li>-->
                        <!--                                    <li><a href="my-account.html">my account</a></li>-->
                        <!--                                </ul>-->
                        <!--                            </div>-->
                        <!--                        </div>-->
                        <!--                        <div class="same-style header-wishlist">-->
                        <!--                            <a href="wishlist.html"><i class="pe-7s-like"></i></a>-->
                        <!--                        </div>-->

                        <?=\frontend\widgets\Shop\CartWidget::widget()?>

                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="slider-area">
        <div class="slider-active owl-carousel nav-style-1">
            <div class="single-slider slider-height-1 bg-red">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-sm-6">
                            <div class="slider-content slider-animated-1">
                                <h3 class="animated">Трикотаж</h3>
                                <h1 class="animated">Новинки Лета <br>2020 Коллекция</h1>
                                <div class="slider-btn btn-hover">
                                    <a class="animated" href="shop.html">В Каталог</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-sm-6">
                            <div class="slider-single-img slider-animated-1">
                                <img class="animated" src="/img/slider/banner-test.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slider slider-height-1 bg-red">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-sm-6">
                            <div class="slider-content slider-animated-1">
                                <h3 class="animated">Smart Products</h3>
                                <h1 class="animated">Summer Offer <br>2019 Collection</h1>
                                <div class="slider-btn btn-hover">
                                    <a class="animated" href="shop.html">SHOP NOW</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-sm-6">
                            <div class="slider-single-img slider-animated-1">
                                <img class="animated" src="/img/slider/single-slide-1.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="funfact-area bg-gray-3 pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-count text-center mb-30">
                        <div class="count-icon">
                            <i class="pe-7s-portfolio"></i>
                        </div>
                        <h2 class="count">360</h2>
                        <span>project done</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-count text-center mb-30">
                        <div class="count-icon">
                            <i class="pe-7s-cup"></i>
                        </div>
                        <h2 class="count">690</h2>
                        <span>cups of coffee</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-count text-center mb-30">
                        <div class="count-icon">
                            <i class="pe-7s-light"></i>
                        </div>
                        <h2 class="count">420</h2>
                        <span>branding</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-count text-center mb-30 mrgn-none">
                        <div class="count-icon">
                            <i class="pe-7s-smile"></i>
                        </div>
                        <h2 class="count">100</h2>
                        <span>happy clients</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="welcome-area pt-95 pb-90">
        <div class="container">
            <div class="welcome-content text-center">
                <h5>Кто мы</h5>
                <h1>Добро пожаловать на сайт ТАНА</h1>
                <p>Мы занимаемся оптовой продажей трикотажных и чулочно-носочных изделий для всей семьи. В нашем ассортименте более двадцати различных торговых марок Российских производителей! Обновление ассортимента каждую неделю. Наш склад открыт для свободного набора, весь товар представлен на витрине. Осуществляем доставку по городу, а также отправляем товар по всей России, Казахстану, любой транспортной компанией. </p>
            </div>
        </div>
    </div>
    <div class="product-area pb-70">
        <div class="container">
            <div class="product-tab-list nav pb-55 text-center">
                <a class="active" href="#product-1" data-toggle="tab" >
                    <h4>Новинки</h4>
                </a>
                <a  href="#product-2" data-toggle="tab">
                    <h4>Распродажа</h4>
                </a>
            </div>
            <div class="tab-content jump">
                <div class="tab-pane active" id="product-1">
                    <div class="row">
                        <?=FeaturedProductsWidget::widget(['limit' => 8])?>
                    </div>
                </div>
                <div class="tab-pane" id="product-2">
                    <div class="row">
                        <div class="col-xl-3 col-md-6 col-lg-4 col-sm-6">
                            <div class="product-wrap mb-25 scroll-zoom">
                                <div class="product-img">
                                    <a href="product-details.html">
                                        <img class="default-img" src="/img/product/pro-1.jpg" alt="">
                                        <img class="hover-img" src="/img/product/pro-1-1.jpg" alt="">
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
                                        <img class="default-img" src="/img/product/pro-2.jpg" alt="">
                                        <img class="hover-img" src="/img/product/pro-2-1.jpg" alt="">
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
                                        <img class="default-img" src="/img/product/pro-3.jpg" alt="">
                                        <img class="hover-img" src="/img/product/pro-3-1.jpg" alt="">
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
                                        <img class="default-img" src="/img/product/pro-4.jpg" alt="">
                                        <img class="hover-img" src="/img/product/pro-4-1.jpg" alt="">
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
                                        <img class="default-img" src="/img/product/pro-5.jpg" alt="">
                                        <img class="hover-img" src="/img/product/pro-5-1.jpg" alt="">
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
                                        <img class="default-img" src="/img/product/pro-6.jpg" alt="">
                                        <img class="hover-img" src="/img/product/pro-6-1.jpg" alt="">
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
                                        <img class="default-img" src="/img/product/pro-7.jpg" alt="">
                                        <img class="hover-img" src="/img/product/pro-4-1.jpg" alt="">
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
                                        <img class="default-img" src="/img/product/pro-8.jpg" alt="">
                                        <img class="hover-img" src="/img/product/pro-6.jpg" alt="">
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
    <div class="instagram-area">
        <div class="instagram-active owl-carousel">
            <div class="single-instagram">
                <a href="#"><img src="/img/brand/1.png" alt=""></a>
            </div>
            <div class="single-instagram">
                <a href="#"><img src="/img/brand/2.png" alt=""></a>
            </div>
            <div class="single-instagram">
                <a href="#"><img src="/img/brand/3.png" alt=""></a>
            </div>
            <div class="single-instagram">
                <a href="#"><img src="/img/brand/4.png" alt=""></a>
            </div>
            <div class="single-instagram">
                <a href="#"><img src="/img/brand/5.png" alt=""></a>
            </div>
            <div class="single-instagram">
                <a href="#"><img src="/img/brand/6.png" alt=""></a>
            </div>
            <div class="single-instagram">
                <a href="#"><img src="/img/brand/7.png" alt=""></a>
            </div>
            <div class="single-instagram">
                <a href="#"><img src="/img/brand/8.png" alt=""></a>
            </div>
            <div class="single-instagram">
                <a href="#"><img src="/img/brand/9.png" alt=""></a>
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
            <a href="<?=Url::home()?>">
                <img class="img-fluid" alt="" src="/img/logo/logo.png">
            </a>
        </div>
        <div id="menu" class="text-left clickable-menu-style">
            <ul>
                <li><a href="<?=Url::home()?>">Главная</i></a></li>
                <li><a href="<?=Url::to(['shop/catalog/index'])?>">Полный каталог</i></a></li>
                <?php //if ($this->beginCache('category_widget_home', ['duration' => 0])) : ?>
                <?=\frontend\widgets\Shop\CategoriesWidgetHome::widget()?>
                <?php //$this->endCache();?>
                <?php //endif;?>
                <li><a href="<?=Url::to(['site/to-partners'])?>">Партнерам</i></a></li>
                <li><a href="<?=Url::to(['site/about'])?>"> О нас</i> </a></li>
                <li><a href="<?=Url::to(['site/info'])?>">Полезная информация</i></a></li>
                <li><a href="<?=Url::to(['contact/index'])?>">Контакты</a></li>
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