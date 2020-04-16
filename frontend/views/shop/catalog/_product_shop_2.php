<?php
use shop\helpers\PriceHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use shop\helpers\ProductStingHelper;


$url = Url::to(['product', 'id' =>$product->id]);
?>

<div class="shop-list-wrap mb-30">
    <div class="row">
        <div class="col-xl-4 col-lg-5 col-md-5 col-sm-6">
            <div class="product-wrap">
                <div class="product-img">
                    <a href="<?= Html::encode($url) ?>">
                        <?php if ($product->mainPhoto): ?>
                            <img class="default-img" src="<?= Html::encode($product->mainPhoto->getThumbFileUrl('file', 'catalog_list')) ?>" alt="<?=Html::encode($product->name)?>">
                            <img class="hover-img" src="<?= Html::encode($product->mainPhoto->getThumbFileUrl('file', 'catalog_list')) ?>" alt="">
                        <?php else:?>
                            <img class="default-img" src="<?=Html::encode(Yii::getAlias('@web')."/img/product/pro-1.jpg")?>" alt="">
                            <img class="hover-img" src="<?=Html::encode(Yii::getAlias('@web')."/img/product/pro-1-1.jpg")?>" alt="">
                        <?php endif; ?>
                    </a>
                    <span class="pink">-10%</span>
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-lg-7 col-md-7 col-sm-6">
            <div class="shop-list-content">
                <h3><a href="<?= Html::encode($url) ?>"><?= Html::encode(ProductStingHelper::cropName($product->name, 48)) ?></a></h3>
                <div class="product-list-price">
                    <span><?= PriceHelper::format($product->price_new) ?>&#8381;</span>
                    <?php if ($product->price_old): ?>
                        <span class="old"><?= PriceHelper::format($product->price_old) ?>&#8381;</span>
                    <?php endif;?>
                </div>
                <div class="rating-review">
                    <div class="product-list-rating">
                        <i class="fa fa-star-o yellow"></i>
                        <i class="fa fa-star-o yellow"></i>
                        <i class="fa fa-star-o yellow"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <a href="#">3 Reviews</a>
                </div>
                <p><?= Yii::$app->formatter->asHtml(ProductStingHelper::cropName($product->description,50)) ?></p>
                <div class="shop-list-btn btn-hover">
                    <a href="#">ADD TO CART</a>
                </div>
            </div>
        </div>
    </div>
</div>
