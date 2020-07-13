<?php

/* @var $this yii\web\View */
/* @var $product shop\entities\Shop\Product\Product */

use shop\helpers\PriceHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use shop\helpers\ProductStingHelper;
$url = Url::to(['product', 'id' =>$product->id]);
?>


<div class="col-xl-4 col-md-6 col-lg-6 col-sm-6">
    <div class="product-wrap mb-25 scroll-zoom">
        <div class="product-img">
            <a href="<?= Html::encode($url) ?>">
            <?php if ($product->mainPhoto): ?>
                <img class="default-img" src="<?= Html::encode($product->mainPhoto->getThumbFileUrl('file', 'catalog_list')) ?>" alt="">
            <?php if(count($product->photos) > 1):?>
                <img class="hover-img" src="<?= Html::encode($product->photos[1]->getThumbFileUrl('file', 'catalog_list')) ?>" alt="">
            <?php endif;?>
            <?php else:?>
                <img class="default-img" src="<?=Html::encode(Yii::getAlias('@web')."/img/product/pro-1.jpg")?>" alt="">
            <?php endif; ?>
            </a>
            <?php if ($product->new) :?>
                <span class="new">Новинка</span>
            <?php endif;?>
            <?php if ($product->sale) :?>
                <span class="sale">Распродажа</span>
            <?php endif;?>
            <div class="product-action">

                <div class="pro-same-action pro-cart">
                    <a title="В корзину" href="<?=Html::encode(Url::to(['/shop/cart/add', 'id' => $product->id]))?>"><i class="pe-7s-cart"></i> В Корзину</a>
                </div>

            </div>
        </div>
        <div class="product-content text-center">
            <h3><a href="<?= Html::encode($url) ?>"><?= Html::encode(ProductStingHelper::cropName($product->name, 48)) ?></a></h3>
            <div class="product-price">
               <!-- <span><?//= PriceHelper::format($product->price_new) ?>&#8381;</span> -->
                <?php if ($product->price_old): ?>
                    <span class="old"><?= PriceHelper::format($product->price_old) ?>&#8381;</span>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>
