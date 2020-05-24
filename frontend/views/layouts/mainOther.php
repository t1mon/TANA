<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Url;
?>
<?php $this->beginContent('@frontend/views/layouts/main.php') ?>
    <header class="header-area header-in-container clearfix">
        <div class="header-top-area">
            <div class="container">
                <div class="header-top-wap">
                    <div class="language-currency-wrap">
                        <div class="same-language-currency use-style">
                            <a href="tel:+78462689565">+7 (846) 268 95 65</a>
                        </div>
                        <div class="same-language-currency use-style">
                            <a href="tel:+79023743876">+ 7 (902) 374 38 76</a>
                        </div>
                        <div class="same-language-currency use-style">
                            <a href="tel:+79179459555">+7 (917) 945 95 55</a>
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
                                <img class="img-fluid" alt="" src="/img/logo/logo.png">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 d-none d-lg-block">
                        <div class="main-menu">
                            <nav>
                                <ul>
                                    <li><a href="<?=Url::home()?>">Главная</i></a></li>
                                    <li><a href="<?=Url::to(['/catalog'])?>">Каталог</i></a></li>
                                    <li><a href="<?=Url::to(['site/to-partners'])?>">Партнерам</i></a></li>
                                    <li><a href="<?=Url::to(['site/about'])?>"> О нас</i> </a></li>
                                    <li><a href="<?=Url::to(['site/info'])?>">Полезная информация</i></a></li>
                                    <li><a href="<?=Url::to(['contact/index'])?>">Контакты</a></li>
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
                            <?=\frontend\widgets\Shop\CartWidget::widget()?>
                        </div>
                    </div>
                </div>
                <div class="mobile-menu-area">
                    <div class="mobile-menu">
                        <nav id="mobile-menu-active">
                            <ul class="menu-overflow">
                                <li><a href="<?=Url::home()?>">Главная</i></a></li>
                                <li><a href="<?=Url::to(['/catalog'])?>">Каталог</i></a></li>
                                <li><a href="<?=Url::to(['site/to-partners'])?>">Партнерам</i></a></li>
                                <li><a href="<?=Url::to(['site/about'])?>"> О нас</i> </a></li>
                                <li><a href="<?=Url::to(['site/info'])?>">Полезная информация</i></a></li>
                                <li><a href="<?=Url::to(['contact/index'])?>">Контакты</a></li>
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
