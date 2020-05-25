<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\widgets\Blog\LastPostsWidget;
use frontend\widgets\Shop\FeaturedProductsWidget;
use yii\helpers\Url;

//\frontend\assets\OwlCarouselAsset::register($this);

?>
<?php $this->beginContent('@frontend/views/layouts/main.php') ?>
<?php $this->title = 'Трикотаж носки колготки оптом'?>
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
            <div class="single-slider slider-height-1 bg-gray-2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-sm-6">
                            <div class="slider-content slider-animated-1">
                                <h1 class="animated">Российский трикотаж<br>Для всей семьи</h1>
                                <div class="slider-btn btn-hover">
                                    <a class="animated" href="<?=Url::to(['/catalog'])?>">В Каталог</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-sm-6">
                            <div class="slider-single-img slider-animated-1">
                                <img class="animated" src="<?=Yii::getAlias('@static')?>/banners/family.png" alt="Российский трикотоаж для всей семьи">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slider slider-height-1 bg-gray-2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-sm-6">
                            <div class="slider-content slider-animated-1">
                                <h1 class="animated">Новые поступления<br>Каждую неделю</h1>
                                <div class="slider-btn btn-hover">
                                    <a class="animated" href="<?=Url::to(['/catalog','new' => 1])?>">Новинки</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-sm-6">
                            <div class="slider-single-img slider-animated-1">
                                <img class="animated" src="<?=Yii::getAlias('@static')?>/banners/new.png" alt="Новинки ООО ТАНА">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="suppoer-area pt-100 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="support-wrap mb-30 support-1">
                        <div class="support-icon">
                            <img class="animated" src="/img/icon-img/30.png" alt="">
                        </div>
                        <div class="support-content">
                            <h5>Более 30-ти торговых марок</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="support-wrap mb-30 support-2">
                        <div class="support-icon">
                            <img class="animated" src="/img/icon-img/rus.png" alt="">
                        </div>
                        <div class="support-content">
                            <h5>Сделано в России</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="support-wrap mb-30 support-3">
                        <div class="support-icon">
                            <img class="animated" src="/img/icon-img/cert.png" alt="">
                        </div>
                        <div class="support-content">
                            <h5>Весь товар сертифицирован </h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="support-wrap mb-30 support-4">
                        <div class="support-icon">
                            <img class="animated" src="/img/icon-img/dilevery.png" alt="">
                        </div>
                        <div class="support-content">
                            <h5>Отгружаем без размерных рядов</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="welcome-area pt-95 pb-90">
        <div class="container">
            <div class="welcome-content text-center">
                <h1>О Нас</h1>
                <p>Мы занимаемся оптовой продажей трикотажных и чулочно-носочных изделий для всей семьи. В нашем ассортименте более 30-ти различных торговых марок Российских производителей! Обновление ассортимента каждую неделю. Наш склад открыт для свободного набора, весь товар представлен на витрине. Осуществляем доставку по городу, а также отправляем товар по всей России, Казахстану, любой транспортной компанией. </p>
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
                        <?=FeaturedProductsWidget::widget(['limit' => 8, 'trigger' => 'new'])?>
                    </div>
                </div>
                <div class="tab-pane" id="product-2">
                    <div class="row">
                        <?=FeaturedProductsWidget::widget(['limit' => 8, 'trigger' => 'sale'])?>
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
                <li><a class="facebook" href="https://vk.com/trikotag63" target="_blank"><i class="fa fa-vk"></i></a></li>
                <li><a class="dribbble" href="https://www.instagram.com/trikotazh_tana/" target="_blank"><i class="fa fa-instagram"></i></a></li>
            </ul>
        </div>
    </div>

<?php $this->endContent() ?>