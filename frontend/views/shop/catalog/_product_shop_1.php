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
                <img class="default-img" src="<?= Html::encode($product->mainPhoto->getThumbFileUrl('file', 'catalog_list')) ?>" alt="<?=Html::encode($product->name)?>">
                <img class="hover-img" src="<?= Html::encode($product->mainPhoto->getThumbFileUrl('file', 'catalog_list')) ?>" alt="">
            <?php else:?>
                <img class="default-img" src="<?=Html::encode(Yii::getAlias('@web')."/img/product/pro-1.jpg")?>" alt="">
                <img class="hover-img" src="<?=Html::encode(Yii::getAlias('@web')."/img/product/pro-1.jpg")?>" alt="">
            <?php endif; ?>
            </a>
            <span class="pink">-10%</span>
            <div class="product-action">
                <div class="pro-same-action pro-wishlist">
                    <a title="Wishlist" href="#"><i class="pe-7s-like"></i></a>
                </div>
                <div class="pro-same-action pro-cart">
                    <a title="Add To Cart" href="#"><i class="pe-7s-cart"></i> В Корзину</a>
                </div>
                <div class="pro-same-action pro-quickview">
                    <a title="Quick View" href="#" data-toggle="modal" data-target="#exampleModal"><i class="pe-7s-look"></i></a>
                </div>
            </div>
        </div>
        <div class="product-content text-center">
            <h3><a href="<?= Html::encode($url) ?>"><?= Html::encode(ProductStingHelper::cropName($product->name, 48)) ?></a></h3>
            <div class="product-rating">
                <i class="fa fa-star-o yellow"></i>
                <i class="fa fa-star-o yellow"></i>
                <i class="fa fa-star-o yellow"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <div class="product-price">
                <span><?= PriceHelper::format($product->price_new) ?></span>
                <?php if ($product->price_old): ?>
                    <span class="old"><?= PriceHelper::format($product->price_old) ?></span>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>
