<?php

/* @var $this yii\web\View */
/* @var $product shop\entities\Shop\Product\Product */
/* @var $cartForm shop\forms\Shop\AddToCartForm */
/* @var $reviewForm shop\forms\Shop\ReviewForm */

use frontend\assets\MagnificPopupAsset;
use shop\helpers\PriceHelper;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\rating\StarRating;

$this->title = $product->getSeoTitle();

$this->registerMetaTag(['name' =>'description', 'content' => $product->meta->description]);
$this->registerMetaTag(['name' =>'keywords', 'content' => $product->meta->keywords]);

$this->params['breadcrumbs'][] = ['label' => 'Каталог', 'url' => ['index']];
$reviews = $product->reviews;

foreach ($product->category->getParents()->all() as $parent) {
    if (!$parent->isRoot()) {
        $this->params['breadcrumbs'][] = ['label' => $parent->name, 'url' => ['category', 'id' => $parent->id]];
    }
}

$this->params['breadcrumbs'][] = ['label' => $product->category->name, 'url' => ['category', 'id' => $product->category->id]];
$this->params['breadcrumbs'][] = $product->name;

$this->params['active_category'] = $product->category;
$reviews_count =$product->getActiveReviewCount($reviews);
?>

<div class="shop-area pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product-details">
                    <div class="product-details-img">
                        <?php if ($product->mainPhoto): ?>
                        <div class="tab-content jump">
                            <?php foreach ($product->photos as $i => $photo): ?>
                                    <?php $activeClass = (int)$photo->sort === 0 ? 'active' : '' ?>
                                    <div id="photo<?=$photo->id?>" class="tab-pane <?=$activeClass?> large-img-style">
                                        <img src="<?= $photo->getThumbFileUrl('file', 'catalog_shop-details') ?>" alt="<?= Html::encode($product->name) ?>">
                                        <?php if ($product->new) :?>
                                            <span class="new">New</span>
                                        <?php endif;?>
                                        <?php if ($product->sale) :?>
                                            <span class="sale">Распродажа</span>
                                        <?php endif;?>
                                        <div class="img-popup-wrap">
                                            <a class="img-popup" href="<?= $photo->getThumbFileUrl('file', 'catalog_img_popup') ?>"><i class="pe-7s-expand1"></i></a>
                                        </div>
                                    </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="shop-details-tab nav">
                            <?php foreach ($product->photos as $i => $photo): ?>
                            <a class="shop-details-overly" href="#photo<?=$photo->id?>" data-toggle="tab">
                                <img src="<?= $photo->getThumbFileUrl('file', 'cart_list') ?>" alt="">
                            </a>
                            <?php endforeach; ?>
                        </div>
                        <?php else:?>
                        <div class="tab-content jump">
                            <div id="shop-details-1" class="tab-pane active large-img-style">
                                <img src="<?=Html::encode(Yii::getAlias('@web')."/img/product-details/large-1.jpg")?>" alt="">
                                <span class="dec-price">-10%</span>
                                <div class="img-popup-wrap">
                                    <a class="img-popup" href="<?=Html::encode(Yii::getAlias('@web')."/img/product-details/b-large-1.jpg")?>"><i class="pe-7s-expand1"></i></a>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product-details-content ml-70">
                    <h2><?=mb_strtoupper(Html::encode($product->name))?></h2>
                    <div class="product-details-price">
                        <span><?= PriceHelper::format($product->price_new) ?>&#8381;</span>
                        <?php if (!empty($product->price_old)): ?>
                            <span class="old"><?= PriceHelper::format($product->price_old) ?>&#8381;</span>
                        <?php endif;?>
                    </div>
                    <div class="pro-details-rating-wrap">
                        <div class="pro-details-rating">
                            <?=\shop\helpers\ProductStingHelper::fakeStar()?>
                        </div>
                        <span><a href="#">3 Reviews</a></span>
                    </div>
                    <div class="pro-details-meta">
                        <span>Категория :</span>
                        <ul>
                            <li><a href="<?=Url::to(['/shop/catalog/category', 'id' => $product->category->id])?>"><?=Html::encode($product->category->name)?></a></li>
                        </ul>
                    </div>
                    <div class="pro-details-meta">
                        <span>Артикуль:</span>
                        <ul>
                            <li><?= Html::encode($product->code) ?></li>
                        </ul>
                    </div>
                    <p>
                        <?= Yii::$app->formatter->asHtml($product->description, [
                            'Attr.AllowedRel' => array('nofollow'),
                            'HTML.SafeObject' => true,
                            'Output.FlashCompat' => true,
                            'HTML.SafeIframe' => true,
                            'URI.SafeIframeRegexp'=>'%^(https?:)?//(www\.youtube(?:-nocookie)?\.com/embed/|player\.vimeo\.com/video/)%',
                        ]) ?>
                    </p>
                    <?php if ($product->isAvailable()): ?>
                    <div class="pro-details-list">
                        <ul><h3>Модельный ряд:</h3>
                            <?php if ($modifications = $product->modifications): ?>
                            <div class="modification">
                            <?php foreach ($modifications as $modification): ?>
                            <?php $modArr = \yii\helpers\ArrayHelper::map($modification->specifications1c->offerspecifications,'specification_id','value'); ?>
                            <?php  $form = ActiveForm::begin(['action' => ['/shop/cart/add', 'id' => $product->id], 'id' =>'offer'.$modification->id]);?>
                                    <?=$form->field($cartForm,'modification')->hiddenInput(['id'=>'mh'.$modification->id,'value' => $modification->id])->label(false)?>
                                    <li>
                                        <div class="pro-details-quality">
                                            <?php if (isset($modArr[1])):?>
                                                <span data-toggle="tooltip" data-placement="top" title="Цвет"><?=$modArr[1]?></span>
                                            <?php endif;?>
                                            <?php if (isset($modArr[2])):?>
                                                <span data-toggle="tooltip" data-placement="top" title="Размер"><?=$modArr[2]?></span>
                                            <?php endif;?>
                                        <div class="cart-plus-minus">
                                            <?=$form->field($cartForm, 'quantity')->textInput(['id'=>'mq'.$modification->id,'class'=> 'cart-plus-minus-box'])->label(false);?>
                                        </div>
                                            <div class="pro-details-cart btn-hover">
                                                <?=Html::submitButton($modification->price."&#8381;&nbsp;<i class=\"pe-7s-cart\"></i>", ['class' => 'btn btn-small btn-dark']);?>

                                            </div>
                                        </div>
                                    </li>
                            <?php   ActiveForm::end();?>
                            <?php endforeach;?>
                            </div>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <div class="pro-details-social">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="description-review-area pb-90">
    <div class="container">
        <div class="description-review-wrapper">
            <div class="description-review-topbar nav">
                <a data-toggle="tab" href="#des-details1">Additional information</a>
                <a class="active" data-toggle="tab" href="#des-details2">Description</a>
                <a data-toggle="tab" href="#des-details3">Reviews (2)</a>
            </div>
            <div class="tab-content description-review-bottom">
                <div id="des-details2" class="tab-pane active">
                    <div class="product-description-wrapper">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>
                        <p>ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commo consequat. Duis aute irure dolor in reprehend in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt </p>
                    </div>
                </div>
                <div id="des-details1" class="tab-pane ">
                    <div class="product-anotherinfo-wrapper">
                        <ul>
                            <li><span>Weight</span> 400 g</li>
                            <li><span>Dimensions</span>10 x 10 x 15 cm </li>
                            <li><span>Materials</span> 60% cotton, 40% polyester</li>
                            <li><span>Other Info</span> American heirloom jean shorts pug seitan letterpress</li>
                        </ul>
                    </div>
                </div>
                <div id="des-details3" class="tab-pane">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="review-wrapper">
                                <div class="single-review">
                                    <div class="review-img">
                                        <img src="/img/testimonial/1.jpg" alt="">
                                    </div>
                                    <div class="review-content">
                                        <div class="review-top-wrap">
                                            <div class="review-left">
                                                <div class="review-name">
                                                    <h4>White Lewis</h4>
                                                </div>
                                                <div class="review-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                            <div class="review-left">
                                                <a href="#">Reply</a>
                                            </div>
                                        </div>
                                        <div class="review-bottom">
                                            <p>Vestibulum ante ipsum primis aucibus orci luctustrices posuere cubilia Curae Suspendisse viverra ed viverra. Mauris ullarper euismod vehicula. Phasellus quam nisi, congue id nulla.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-review child-review">
                                    <div class="review-img">
                                        <img src="/img/testimonial/2.jpg" alt="">
                                    </div>
                                    <div class="review-content">
                                        <div class="review-top-wrap">
                                            <div class="review-left">
                                                <div class="review-name">
                                                    <h4>White Lewis</h4>
                                                </div>
                                                <div class="review-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                            <div class="review-left">
                                                <a href="#">Reply</a>
                                            </div>
                                        </div>
                                        <div class="review-bottom">
                                            <p>Vestibulum ante ipsum primis aucibus orci luctustrices posuere cubilia Curae Sus pen disse viverra ed viverra. Mauris ullarper euismod vehicula. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="ratting-form-wrapper pl-50">
                                <h3>Add a Review</h3>
                                <div class="ratting-form">
                                    <form action="#">
                                        <div class="star-box">
                                            <span>Your rating:</span>
                                            <div class="ratting-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="rating-form-style mb-10">
                                                    <input placeholder="Name" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="rating-form-style mb-10">
                                                    <input placeholder="Email" type="email">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="rating-form-style form-submit">
                                                    <textarea name="Your Review" placeholder="Message"></textarea>
                                                    <input type="submit" value="Submit">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>