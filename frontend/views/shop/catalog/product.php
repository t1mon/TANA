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
            <div class="col-xl-7 col-lg-7 col-md-12">
                <?php if ($product->mainPhoto): ?>
                <div class="product-details-img mr-20 product-details-tab">
                    <div id="gallery" class="product-dec-slider-2">
                        <?php foreach ($product->photos as $i => $photo): ?>
                        <a data-image="<?= $photo->getThumbFileUrl('file', 'product_thumb-570-720') ?>" data-zoom-image="<?= $photo->getImageFileUrl('file') ?>">
                            <img src="<?= $photo->getThumbFileUrl('file', 'product_thumb-90-100') ?>" alt="">
                        </a>
                        <?php endforeach; ?>
                    </div>
                    <div class="zoompro-wrap zoompro-2 pl-20">
                        <div class="zoompro-border zoompro-span">
                            <img class="zoompro" src="<?= $product->photos[0]->getThumbFileUrl('file', 'product_thumb-570-720') ?>" data-zoom-image="<?= $product->photos[0]->getImageFileUrl('file') ?>" alt=""/>
                            <?php if ($product->new) :?>
                                <span class="new">Новинка</span>
                            <?php endif;?>
                            <?php if ($product->sale) :?>
                                <span class="sale">Распродажа</span>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
                <?php else:?>
                    <div class="product-details-img mr-20 product-details-tab">
                        <div id="gallery" class="product-dec-slider-2">
                            <a data-image="<?=Html::encode(Yii::getAlias('@web')."/img/product-details/product-detalis-l1.jpg") ?>" data-zoom-image="<?=Html::encode(Yii::getAlias('@web')."/img/product-details/product-detalis-bl1.jpg") ?>">
                                <img src="<?=Html::encode(Yii::getAlias('@web')."/img/product-details/product-detalis-s6.jpg") ?>" alt="">
                            </a>
                        </div>
                        <div class="zoompro-wrap zoompro-2 pl-20">
                            <div class="zoompro-border zoompro-span">
                                <img class="zoompro" src="<?=Html::encode(Yii::getAlias('@web')."/img/product-details/product-detalis-l1.jpg") ?>" data-zoom-image="<?=Html::encode(Yii::getAlias('@web')."/img/product-details/product-detalis-bl1.jpg") ?> alt=""/>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-5 col-lg-5 col-md-12">
                <div class="product-details-content">
                    <h2><?=mb_strtoupper(Html::encode($product->name))?></h2>
                    <div class="product-details-price">
                        <span><?= PriceHelper::format($product->price_new) ?>&#8381;</span>
                        <?php if (!empty($product->price_old)): ?>
                            <span class="old"><?= PriceHelper::format($product->price_old) ?>&#8381;</span>
                        <?php endif;?>
                    </div>
<!--                    <div class="pro-details-rating-wrap">-->
<!--                        <span><a href="#">3 Отзыва</a></span>-->
<!--                    </div>-->
                    <div class="pro-details-meta">
                        <span>Артикул :</span>
                        <ul>
                            <li><?= Html::encode($product->code) ?></li>
                        </ul>
                    </div>
                    <div class="pro-details-meta">
                        <span>Категория :</span>
                        <ul>
                            <li><a href="<?=Url::to(['/shop/catalog/category', 'id' => $product->category->id])?>"><?=Html::encode($product->category->name)?></a></li>
                        </ul>
                    </div>
                    <p><?= Yii::$app->formatter->asHtml($product->description, [
                            'Attr.AllowedRel' => array('nofollow'),
                            'HTML.SafeObject' => true,
                            'Output.FlashCompat' => true,
                            'HTML.SafeIframe' => true,
                            'URI.SafeIframeRegexp'=>'%^(https?:)?//(www\.youtube(?:-nocookie)?\.com/embed/|player\.vimeo\.com/video/)%',
                        ]) ?>
                    </p>
                    <?php if ($otherModifications = $cartForm->otherModificationList()): ?>
                    <div class="pro-details-list">

                        <ul>
                            <?php foreach ($otherModifications as $otherModification):?>
                            <li>- <?=$otherModification?></li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                    <?php endif;?>
                    <?php if ($product->isAvailable()): ?>
                    <form>

                    <?php if ($modifications = $cartForm->modificationsList1C()): ?>
                        <?php // $form->field($cartForm, 'modification')->checkboxList($modifications, ['class'=>''])->label('Модельный ряд (размер,цвет):') ?>
                        <div class="checkbox">
                            <ul>
                         <?php foreach ($modifications as $modification_id=>$modification): ?>
                            <li>
                                <input type="checkbox" id="<?=$modification_id?>" name="scales"><label for="<?=$modification_id?>"><?=$modification?>
                                </label>
                                <div class="modification-plus-minus">
                                    <div class="dec qtybutton" data-id="<?=$modification_id?>">-</div>
                                    <input id="<?=$modification_id?>-qty" class="qty-input" data-qty="0" type="text" name="<?=$modification_id?>" value="0">
                                    <div class="inc qtybutton" data-id="<?=$modification_id?>">+</div>
                                </div>
                            </li>
                        <?php endforeach;?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <div class="pro-details-quality">
<!--                        <div class="cart-plus-minus">-->
<!--                            <input class="cart-plus-minus-box" type="text" name="qtybutton" value="0">-->
<!--                        </div>-->
                        <div class="pro-details-cart btn-hover">
                            <a id="add-to-cart" href="#">Добавить в <i class="pe-7s-cart"></i></a>
                        </div>
                    </div>
                    </form>
                    <?php endif;?>
                    <div class="pro-details-social">
                        <ul>
                            <li><a  href="https://vk.com/trikotag63" target="_blank"><i class="fa fa-vk"></i></a></li>
                            <li><a  href="https://www.instagram.com/trikotazh_tana/" target="_blank"><i class="fa fa-instagram"></i></a></li>
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
                <a class="active" data-toggle="tab" href="#des-details1">Характеристики</a>
                <?php if ($product->description):?>
                <a data-toggle="tab" href="#des-details2">Описание</a>
                <?php endif;?>
                <a data-toggle="tab" href="#des-details3">Отзывы (0)</a>
            </div>
            <div class="tab-content description-review-bottom">
                <div id="des-details2" class="tab-pane">
                    <div class="product-description-wrapper">
                        <p>
                            <?= Yii::$app->formatter->asHtml($product->description, [
                                'Attr.AllowedRel' => array('nofollow'),
                                'HTML.SafeObject' => true,
                                'Output.FlashCompat' => true,
                                'HTML.SafeIframe' => true,
                                'URI.SafeIframeRegexp'=>'%^(https?:)?//(www\.youtube(?:-nocookie)?\.com/embed/|player\.vimeo\.com/video/)%',
                            ]) ?>
                        </p>
                    </div>
                </div>
                <div id="des-details1" class="tab-pane active">
                    <div class="product-anotherinfo-wrapper">
                        <?php if ($otherModifications = $cartForm->otherModificationList()): ?>
                        <ul>
                            <?php foreach ($otherModifications as $key=>$otherModification):?>
                                <?php if ($key==3):?>
                                <li><span>Состав полотна</span> <?=$otherModification?></li>
                                <?php endif;?>
                                <?php if ($key==4):?>
                                    <li><span>Полотно</span> <?=$otherModification?></li>
                                <?php endif;?>
                            <?php endforeach;?>
                        </ul>
                        <?php endif;?>
                    </div>
                </div>
                <div id="des-details3" class="tab-pane">
                    <div class="row">
                        <div class="col-lg-7">
                            <h2 style="color: red"> Отзывы временно отключены</h2>
<!--                            <div class="review-wrapper">-->
<!--                                <div class="single-review">-->
<!--                                    <div class="review-img">-->
<!--                                        <img src="/img/testimonial/1.jpg" alt="">-->
<!--                                    </div>-->
<!--                                    <div class="review-content">-->
<!--                                        <div class="review-top-wrap">-->
<!--                                            <div class="review-left">-->
<!--                                                <div class="review-name">-->
<!--                                                    <h4>White Lewis</h4>-->
<!--                                                </div>-->
<!--                                                <div class="review-rating">-->
<!--                                                    <i class="fa fa-star"></i>-->
<!--                                                    <i class="fa fa-star"></i>-->
<!--                                                    <i class="fa fa-star"></i>-->
<!--                                                    <i class="fa fa-star"></i>-->
<!--                                                    <i class="fa fa-star"></i>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div class="review-left">-->
<!--                                                <a href="#">Reply</a>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="review-bottom">-->
<!--                                            <p>Vestibulum ante ipsum primis aucibus orci luctustrices posuere cubilia Curae Suspendisse viverra ed viverra. Mauris ullarper euismod vehicula. Phasellus quam nisi, congue id nulla.</p>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="single-review child-review">-->
<!--                                    <div class="review-img">-->
<!--                                        <img src="/img/testimonial/2.jpg" alt="">-->
<!--                                    </div>-->
<!--                                    <div class="review-content">-->
<!--                                        <div class="review-top-wrap">-->
<!--                                            <div class="review-left">-->
<!--                                                <div class="review-name">-->
<!--                                                    <h4>White Lewis</h4>-->
<!--                                                </div>-->
<!--                                                <div class="review-rating">-->
<!--                                                    <i class="fa fa-star"></i>-->
<!--                                                    <i class="fa fa-star"></i>-->
<!--                                                    <i class="fa fa-star"></i>-->
<!--                                                    <i class="fa fa-star"></i>-->
<!--                                                    <i class="fa fa-star"></i>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div class="review-left">-->
<!--                                                <a href="#">Reply</a>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="review-bottom">-->
<!--                                            <p>Vestibulum ante ipsum primis aucibus orci luctustrices posuere cubilia Curae Sus pen disse viverra ed viverra. Mauris ullarper euismod vehicula. </p>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
                        </div>
                        <div class="col-lg-5">
                            <div class="ratting-form-wrapper pl-50">
                                <h3>Добавить отзыв</h3>
                                <div class="ratting-form">
                                    <form action="#">
                                        <div class="star-box">
                                            <span>Рейтинг:</span>
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
                                                    <input placeholder="Имя" type="text" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="rating-form-style mb-10">
                                                    <input placeholder="Email" type="email" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="rating-form-style form-submit">
                                                    <textarea name="Your Review" placeholder="Текст" disabled></textarea>
                                                    <input type="submit" value="Добавить отзыв" disabled>
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
<?=\frontend\widgets\Shop\SellOutWidgetProduct::widget(['limit' => 8 , 'trigger' => 'sale'])?>

<?php
$script = <<<JS

    function validQty(id) {
       if (+id.attr('data-qty') < +id.val() ){
           isValid = false
           $.jGrowl("Кол-во превышает остаток на складе ",{theme:'jgrowl danger',life:10000});
           id.css({'background-color':'red','color':'#fff'})
       }else{
           isValid = true
           id.css({'background-color':'inherit','color':'inherit'})
       }
       
       if (id.val() == 0 ){
           isValid = false
           $.jGrowl(" Кол-во не должно равняться 0 ",{theme:'jgrowl danger',life:10000});
       }
       
       
    }
    var isValid = false
    // Отправка данных в корзину
    $('#add-to-cart').on('click',function(event) {
         event.preventDefault()
         if($('.checkbox input:checked').length == 0){
             isValid = false
             $.jGrowl("Не выбран размерный ряд",{theme:'jgrowl danger',life:10000});
         }else{
             isValid = true
         }
        if (isValid){
         var data = []
          $('.checkbox input:checked').each(function() {
              product_id = $product->id
              mod_id = $(this).attr('id')
              val = $('#'+mod_id+'-qty').val()          
              data.push({'productId':product_id,'modId':mod_id,'val':val})
          })   
          data = JSON.stringify(data)
          $.post('/shop/cart/add-ajax',data,function(dataserv) {
              if (dataserv){ 
                  window.location.reload()
              }
            //console.log(dataserv)
          })
    }
    })
    //Получение остатка  
    $('.checkbox :checkbox').each(function() {
     
        var mod_id = $(this).attr('id')
        $.post('/shop/cart/qty-get',mod_id,function(dataserv) {
            if (dataserv['error'] != 'ERROR'){
                $('#'+mod_id+'-qty').attr("data-qty", dataserv)
                console.log(dataserv)
            }
        })
    })
    //Валидация
    
    $('.qty-input').on('input', function() {
        $(this).val($(this).val().replace(/[A-Za-zА-Яа-яЁё.]/, ''))
    });
    $('.qty-input').on('input',function() {
        validQty($(this))
    })
    $('.dec').on('click',function() {
        id = $(this).attr('data-id')
        validQty($('#'+id+'-qty'))
    })
     $('.inc').on('click',function() {
        id = $(this).attr('data-id')
        validQty($('#'+id+'-qty'))
    })

JS;

$this->registerJs($script,yii\web\View::POS_READY);
?>
