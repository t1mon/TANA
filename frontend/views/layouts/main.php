<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use frontend\widgets\Shop\CartWidget;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use shop\entities\Shop\Category;

AppAsset::register($this);
\frontend\widgets\JgrowlWidget::widget();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <?= Html::csrfMetaTags() ?>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= Html::encode($this->title) ?></title>
    <link href="<?= Html::encode(Url::canonical()) ?>" rel="canonical"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php Yii::$app->view->registerLinkTag(['rel' => 'shortcut icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);?>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?=$content?>
<footer class="footer-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-4 col-sm-4">
                <div class="copyright mb-30">
                    <div class="footer-logo">
                        <a href="<?=Url::home()?>">
                            <img alt="" src="/img/logo/logo.png">
                        </a>
                    </div>
                    <p>© <?=date('Y')?> <a href="<?=Url::home()?>">ООО ТАНА</a>.</p>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4">
                <div class="footer-widget mb-30 ml-30">
                    <div class="footer-title">
                        <h3>Телефоны</h3>
                    </div>
                    <div class="footer-list">
                        <ul>
                            <li><a href="tel:+78462689565">+7 (846) 268 95 65</a></li>
                            <li><a href="tel:+79023743876">+ 7 (902) 374 38 76</a></li>
                            <li><a href="tel:+79179459555">+7 (917) 945 95 55</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4">
                <div class="footer-widget mb-30 ml-50">
                    <div class="footer-title">
                        <h3>Полезное</h3>
                    </div>
                    <div class="footer-list">
                        <ul>
                            <li><a href="<?=Url::to(['site/to-partners'])?>">Партнерам</i></a></li>
                            <li><a href="<?=Url::to(['site/info'])?>">Полезная информация</i></a></li>
                            <li><a href="<?=Url::to(['site/about'])?>"> О нас</i> </a></li>
                            <li><a href="<?=Url::to(['contact/index'])?>">Контакты</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="footer-widget mb-30 ml-75">
                    <div class="footer-title">
                        <h3>Мы в</h3>
                    </div>
                    <div class="footer-list">
                        <ul>
                            <li><a href="#">Instagram</a></li>
                            <li><a href="#">Youtube</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="footer-widget mb-30 ml-70">
                    <div class="footer-title">
                        <h3>ПОДПИСАТЬСЯ</h3>
                    </div>
                    <div class="subscribe-style">
                        <p>Получайте информацию  о новинках нашего каталога и специальные предложения</p>
                        <div class="subscribe-form">
                            <form>
                                <div class="mc-form">
                                    <input class="email" type="email" required="" placeholder="Введите свой email сюда.." name="EMAIL" value="">
                                    <div class="mc-news" aria-hidden="true">
                                        <input type="text" value="" tabindex="-1" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef">
                                    </div>
                                    <div class="clear">
                                        <input class="button" type="submit" name="subscribe" value="Подписаться">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
