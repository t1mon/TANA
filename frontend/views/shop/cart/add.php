<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \shop\forms\Shop\AddToCartForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Выбор модификации продукта';
$this->params['breadcrumbs'][] = ['label' => 'Каталог', 'url' => ['/shop/catalog/index']];
$this->params['breadcrumbs'][] = ['label' => 'Корзина', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h4 class="text-center">Пожалуйста выберети модификацию продукта</h4>
<?php if ($modifications = $product->modifications): ?>

    <div class="modification">
        <?php foreach ($modifications as $modification): ?>
            <?php $modArr = \yii\helpers\ArrayHelper::map($modification->specifications1c->offerspecifications,'specification_id','value'); ?>
            <?php  $form = ActiveForm::begin(['action' => ['/shop/cart/add', 'id' => $product->id], 'id' =>'offer'.$modification->id]);?>
            <?=$form->field($model,'modification')->hiddenInput(['id'=>'mh'.$modification->id,'value' => $modification->id])->label(false)?>
            <li>
                <div class="pro-details-quality">
                    <?php if (isset($modArr[1])):?>
                        <span data-toggle="tooltip" data-placement="top" title="Цвет"><?=$modArr[1]?></span>
                    <?php endif;?>
                    <?php if (isset($modArr[2])):?>
                        <span data-toggle="tooltip" data-placement="top" title="Размер"><?=$modArr[2]?></span>
                    <?php endif;?>
                    <div class="cart-plus-minus">
                        <?=$form->field($model, 'quantity')->textInput(['id'=>'mq'.$modification->id,'class'=> 'cart-plus-minus-box'])->label(false);?>
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
