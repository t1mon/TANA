<?php

/* @var $cart \shop\cart\Cart */

use shop\helpers\PriceHelper;
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="same-style cart-wrap">
    <?php $items = $cart->getItems()?>
    <a  href="<?=Url::to(['/shop/cart/index'])?>" class="icon-cart">
        <i class="pe-7s-shopbag"></i>
        <?php if ($count =count($items)):?>
            <span class="count-style"><?=$count?></span>
        <?php endif; ?>
    </a>
    <div class="shopping-cart-content">
        <ul>
            <?php foreach ($items as $item): ?>
            <?php
            $product = $item->getProduct();
            $modification = $item->getModification();
            $url = Url::to(['/shop/catalog/product', 'id' => $product->id]);
            ?>
            <li class="single-shopping-cart">
                <div class="shopping-cart-img">
                    <?php if ($product->mainPhoto): ?>
                            <a href="<?= $url ?>"><img alt="" src="<?= $product->mainPhoto->getThumbFileUrl('file', 'cart_widget_list') ?>"></a>
                    <?php else:?>
                            <a href="<?= $url ?>"><img alt="" src="/img/cart/cart-2.png"></a>
                    <?php endif; ?>
                </div>
                <div class="shopping-cart-title">
                    <?php if ($modification): ?>
                        <h4><a href="<?= $url ?>"><?= Html::encode($modification->name) ?></a></h4>
                    <?php else:?>
                        <h4><a href="<?= $url ?>"><?= Html::encode($product->name) ?></a></h4>
                    <?php endif; ?>
                    <h6>Кол-во: <?= $item->getQuantity() ?></h6>
                    <span>Цена: <?= PriceHelper::format($item->getCost()) ?> &#8381;</span>
                </div>
                <div class="shopping-cart-delete">
                    <a href="<?= Url::to(['/shop/cart/remove', 'id' => $item->getId()]) ?>" data-method="POST"><i class="fa fa-times-circle"></i></a>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php $cost = $cart->getCost(); ?>
        <?php foreach ($cost->getDiscounts() as $discount): ?>
            <tr>
                <td class="text-right"><strong><?= Html::encode($discount->getName()) ?>:</strong></td>
                <td class="text-right"><?= PriceHelper::format($discount->getValue()) ?></td>
            </tr>
        <?php endforeach; ?>
        <div class="shopping-cart-total">
            <h4>Сумма : <span class="shop-total"><?= PriceHelper::format($cost->getTotal()) ?>&#8381;</span></h4>
        </div>
        <div class="shopping-cart-btn btn-hover text-center">
            <a class="default-btn" href="<?= Html::encode(Url::to(['/shop/cart/index'])) ?>">В корзину</a>
            <a class="default-btn" href="<?= Html::encode(Url::to(['/shop/checkout/index'])) ?>">Оформить</a>
        </div>
    </div>
</div>