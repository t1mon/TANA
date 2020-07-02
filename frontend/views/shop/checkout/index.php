<?php

/* @var $this yii\web\View */
/* @var $cart \shop\cart\Cart */
/* @var $model \shop\forms\Shop\Order\OrderForm */

use shop\helpers\PriceHelper;
use shop\helpers\WeightHelper;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Оформление заказа';
$this->params['breadcrumbs'][] = ['label' => 'Корзина', 'url' => ['/shop/cart/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="checkout-area pt-95 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="billing-info-wrap">
                    <h3>Информация для заказа</h3>
                    <?php $form = ActiveForm::begin(['id'=>'order']) ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="billing-info mb-20">
                                <label>ФИО</label>
                                <?= $form->field($model->customer, 'name')->textInput(['class' => ''])->label(false) ?>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="billing-select mb-20">
                                <label>Доставка</label>
                                <?= $form->field($model->delivery, 'method')->dropDownList($model->delivery->deliveryMethodsList(), ['class'=>'selectpicker'])->label(false) ?>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="billing-info mb-20">
                                <label>Адрес доставки</label>
                                <?= $form->field($model->delivery, 'address')->textInput(['class'=>'billing-address', 'placeholder' => 'Название улицы и номер дома'])->label(false) ?>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="billing-info mb-20">
                                <label>Телефон</label>
                                <?= $form->field($model->customer, 'phone')->widget(\yii\widgets\MaskedInput::className(), [
                                    'mask' => '+7(999)-999-9999',
                                    'options' => ['class' => '']
                                ])->label(false) ?>
                            </div>
                        </div>
                    </div>
                    <?= $form->field($model->delivery, 'index')->hiddenInput()->label(false) ?>
                    <?= $form->field($model, 'note')->textarea()->label('Комментарий к заказу') ?>
                    <?php ActiveForm::end() ?>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="your-order-area">
                    <h3>Ваш заказ</h3>
                    <div class="your-order-wrap gray-bg-4">
                        <div class="your-order-product-info">
                            <div class="your-order-top">
                                <ul>
                                    <li>Наименование</li>
                                    <li>Сумма</li>
                                </ul>
                            </div>
                            <div class="your-order-middle">
                                <ul>
                                    <?php foreach ($cart->getItems() as $item): ?>
                                    <?php
                                    $product = $item->getProduct();
                                    $modification = $item->getModification();
                                    $url = Url::to(['/shop/catalog/product', 'id' => $product->id]);
                                    ?>
                                    <li><span class="order-middle-left"><?= Html::encode($modification->name) ?></span> <span class="order-price"><?= PriceHelper::format($item->getCost()) ?>&#8381;</span></li>
                                    <?php endforeach;?>
                                </ul>
                            </div>
                            <?php $cost = $cart->getCost() ?>
                            <div class="your-order-total">
                                <ul>
                                    <li class="order-total">Сумма к оплате</li>
                                    <li><?= PriceHelper::format($cost->getTotal()) ?>&#8381;</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="Place-order mt-25">
                        <a id="submit-check-button" class="btn-hover" href="#">Оформить заказ</a>
                        <?= Html::submitButton('Оформить заказ', ['id'=>'submit-check' , 'class' => 'btn-hover hidden','form' => 'order']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$script = <<<JS
  document.getElementById('submit-check-button').addEventListener('click',function(event) {
      event.preventDefault()
      document.getElementById('submit-check').click()
  })
  //смена доставки
  
JS;

$this->registerJs($script,yii\web\View::POS_READY);
?>
