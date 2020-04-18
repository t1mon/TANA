<?php

/* @var $this \yii\web\View */
/* @var $content string */

?>
<?php $this->beginContent('@frontend/views/layouts/main.php') ?>
    <header class="header-area header-in-container clearfix">
        <div class="header-top-area">
            <div class="container">
                <div class="header-top-wap">
                    <div class="language-currency-wrap">
                        <div class="same-language-currency use-style">
                            <a href="#">+7 (846) 268 95 65</a>
                        </div>
                        <div class="same-language-currency use-style">
                            <a href="#">+ 7 (902) 374 38 76</a>
                        </div>
                        <div class="same-language-currency use-style">
                            <a href="#">+7 (917) 945 95 55</a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom sticky-bar header-res-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-6 col-4">
                        <div class="logo">
                            <a href="<?=\yii\helpers\Url::home()?>">
                                <img alt="" src="/img/logo/logo.png">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 d-none d-lg-block">
                        <div class="main-menu">
                            <nav>
                                <ul>
                                    <li><a href="index.html">Главная</i></a></li>
                                    <li><a href="#">Партнерам</i></a></li>
                                    <li><a href="shop.html"> О нас</i> </a></li>
                                    <li><a href="#">Полезная информация</i></a></li>
                                    <li><a href="shop.html">Контакты</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-6 col-8">
                        <div class="header-right-wrap">
                            <div class="same-style header-search">
                                <a class="search-active" href="#"><i class="pe-7s-search"></i></a>
                                <div class="search-content">
                                    <?= \yii\helpers\Html::beginForm(['/shop/catalog/search'], 'get') ?>
                                        <input type="text" name="text" placeholder="Поиск" />
                                        <button class="button-search"><i class="pe-7s-search"></i></button>
                                    <?= \yii\helpers\Html::endForm() ?>
                                </div>
                            </div>
<!--                            <div class="same-style account-satting">-->
<!--                                <a class="account-satting-active" href="#"><i class="pe-7s-user-female"></i></a>-->
<!--                                <div class="account-dropdown">-->
<!--                                    <ul>-->
<!--                                        <li><a href="login-register.html">Login</a></li>-->
<!--                                        <li><a href="login-register.html">Register</a></li>-->
<!--                                        <li><a href="wishlist.html">Wishlist  </a></li>-->
<!--                                        <li><a href="my-account.html">my account</a></li>-->
<!--                                    </ul>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="same-style header-wishlist">-->
<!--                                <a href="wishlist.html"><i class="pe-7s-like"></i></a>-->
<!--                            </div>-->
                            <?=\frontend\widgets\Shop\CartWidget::widget()?>
                        </div>
                    </div>
                </div>
                <div class="mobile-menu-area">
                    <div class="mobile-menu">
                        <nav id="mobile-menu-active">
                            <ul class="menu-overflow">
                                <li><a href="index.html">Главная</i></a></li>
                                <li><a href="#">Партнерам</i></a></li>
                                <li><a href="shop.html"> О нас</i> </a></li>
                                <li><a href="#">Полезная информация</i></a></li>
                                <li><a href="shop.html">Контакты</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
        <div class="container">
            <div class="breadcrumb-content text-center">
                        <!-- Breadcrumb -->
                        <?= \yii\bootstrap4\Breadcrumbs::widget([
                            'tag' => 'ul',
                            'itemTemplate' => "<li>{link}</li>\n",
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                            'options' => ['id'=>'breadcrumbs','class' => '', 'style' => ''],
                        ]) ?>
            </div>
        </div>
    </div>
<?=$content?>
<?php
$script = <<<JS
    id = document.getElementById('breadcrumbs')
    id.classList.remove('breadcrumb')
JS;
$this->registerJs($script,yii\web\View::POS_END);
?>

<?php $this->endContent()?>