<?php

/* @var $this yii\web\View */
/* @var $cart \shop\cart\Cart */

use shop\helpers\PriceHelper;
use shop\helpers\WeightHelper;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Корзина';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="cart-main-area pt-90 pb-100">
        <div class="container">
            <h3 class="cart-page-title">Корзина товаров</h3>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="table-content table-responsive cart-table-content">
                        <table>
                            <thead>
                            <tr>
                                <th>Фото</th>
                                <th>Продукт</th>
                                <th>Комментарий</th>
                                <th>Цена</th>
                                <th>Кол-во</th>
                                <th>Всего</th>
                                <th>Управление</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($cart->getItems()):?>
                                <?php foreach ( $items = $cart->getItems() as $item): ?>
                                    <?php
                                    $product = $item->getProduct();
                                    $modification = $item->getModification();
                                    $url = Url::to(['/shop/catalog/product', 'id' => $product->id]);?>
                                    <tr>
                                        <td class="product-thumbnail">
                                            <?php if ($product->mainPhoto): ?>
                                                <a href="<?=$url?>"><img src="<?= $product->mainPhoto->getThumbFileUrl('file', 'cart_list') ?>" alt=""></a>
                                            <?php else:?>
                                                <a href="<?=$url?>"><img src="/img/photo-work/photo.jpg" alt="" width="82px" height="82px"></a>
                                            <?php endif; ?>
                                        </td>
                                        <td class="product-name">
                                            <?php if ($modification): ?>
                                                <a href="<?=$url?>"><?= Html::encode($product->name) ?><br><small><?= $modificationName = str_replace(Html::encode($product->name),'',Html::encode($modification->name)) ?></small></a>
                                            <?php else:?>
                                                <a href="<?=$url?>"><?= Html::encode($product->name) ?></a>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <textarea data-item-id="<?=$item->getId()?>" rows="2" class="comment-cart"><?=$item->getComment()?></textarea>
                                        </td>
                                        <td class="product-price-cart"><span class="amount"><?= PriceHelper::format($item->getPrice()) ?>&#8381;</span></td>
                                        <td class="product-quantity">
                                            <div class="cart-plus-minus">

                                                <input id="<?=$item->getId()?>" class="cart-plus-minus-box" type="text" name="quantity" value="<?=$item->getQuantity() ?>">

                                            </div>
                                        </td>
                                        <td class="product-subtotal"><?= PriceHelper::format($item->getCost()) ?>&#8381;</td>
                                        <td class="product-remove">
                                            <a href="#." class="refresh" data-id="<?=$item->getId()?>"><i class="fa fa-refresh"></i></a>
                                            <a href="<?= Url::to(['remove', 'id' => $item->getId()]) ?>" data-method="post"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                            <?php endif;?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cart-shiping-update-wrapper">
                                <div class="cart-clear">
                                    <a href="<?= Url::to('/shop/cart/clear') ?>">Очистить корзину</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 col-md-8">
                            <div class="discount-code-wrapper">
                                <div class="title-wrap">
                                    <h4 class="cart-bottom-title section-bg-gray">Промокод</h4>
                                </div>
                                <div class="discount-code">
                                    <p>Введите промокод для активации</p>
                                    <form>
                                        <input type="text" required="" name="name">
                                        <button onclick="$.jGrowl('Промокод не найден!',{ closer: false ,life:5000,theme:'jgrowl warning'});" class="cart-btn-2" type="button">Применить</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php $cost = $cart->getCost() ?>
                        <?php if ($cart->getItems()): ?>
                            <div class="col-lg-4 col-md-12">
                                <div class="grand-totall">
                                    <div class="title-wrap">
                                        <h4 class="cart-bottom-title section-bg-gary-cart">Сумма</h4>
                                    </div>
                                    <h5>Покупок на сумму <span><?= PriceHelper::format($cost->getOrigin()) ?><i class="fa fa-fw fa-rub"></i></span></h5>
                                    <?php if ($cost->getDiscounts()): ?>
                                        <?php foreach ($cost->getDiscounts() as $discount): ?>
                                            <h5>СКИДКА <?= Html::encode($discount->getName()) ?>: <span> <?= PriceHelper::format($discount->getValue()) ?><i class="fa fa-fw fa-rub"></i></span></h5>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <h5>СКИДКА <span>0 <i class="fa fa-fw fa-rub"></i></span></h5>
                                    <?php endif;?>
                                    <h4 class="grand-totall-title">Всего к оплате:  <span><?= PriceHelper::format($cost->getTotal()) ?><i class="fa fa-fw fa-rub"></i></span></h4>
                                    <a href="<?= Url::to('/shop/checkout/index') ?>">Оформить заказ</a>
                                </div>
                            </div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
$script = <<<JS
    $(".refresh").click(function() {
       id = $(this).data("id")
       quantity = $("#" + id).val()
       refresh(id,quantity)
    })
    function refresh(id,quantity){
                $.post( "shop/cart/quantity?id="+id, { quantity: quantity})
                    .done(function() {
                            location.reload()
                    }).fail(function(error) {
                        console.log(error)
                    })
    }
    $(".comment-cart").blur(function() {
      const data = JSON.stringify({id:$(this).attr('data-item-id'),comment:$(this).val()})
      $.post("/shop/cart/set-comment-items", data)
      .done(function(msg) {console.log('added comment...')})
      .fail(function(error) {console.log(error)})
    })
JS;
$this->registerJs($script,yii\web\View::POS_END);
?>