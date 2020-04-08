<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\DataProviderInterface */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

?>

<!--<div class="row">
    <div class="col-sm-6 text-left">
        <?= LinkPager::widget([
    'pagination' => $dataProvider->getPagination(),
]) ?>
    </div>
    <div class="col-sm-6 text-right">Showing <?= $dataProvider->getCount() ?> of <?= $dataProvider->getTotalCount() ?></div>
</div> -->





<div class="col-lg-9">
    <div class="shop-top-bar">
        <div class="select-shoing-wrap">
            <div class="shop-select">
                <select class="selectpicker" onchange="location = this.value;">
                    <?php
                    $values = [
                        '' => 'сортировка',
                        'name' => 'По имени (А - Я)',
                        '-name' => 'По имени (Я - А)',
                        'price' => 'По возрастанию цены',
                        '-price' => 'По убыванию цены',
                        '-rating' => 'По рейтингу (высокий)',
                        'rating' => 'По рейтингу (низкий)',
                    ];
                    $current = Yii::$app->request->get('sort');
                    ?>
                    <?php foreach ($values as $value => $label): ?>
                        <option value="<?= Html::encode(Url::current(['sort' => $value ?: null])) ?>" <?php if ($current == $value): ?>selected="selected"<?php endif; ?>><?= $label ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <p><?=\shop\helpers\ProductStingHelper::productFields($dataProvider)?></p>
        </div>
        <div class="shop-tab nav">
            <a class="active" href="#shop-1" data-toggle="tab">
                <i class="fa fa-table"></i>
            </a>
            <a href="#shop-2" data-toggle="tab">
                <i class="fa fa-list-ul"></i>
            </a>
        </div>
    </div>
    <div class="shop-bottom-area mt-35">
        <div class="tab-content jump">
            <div id="shop-1" class="tab-pane active">
                <div class="row">
                    <?php foreach ($dataProvider->getModels() as $product): ?>
                        <?= $this->render('_product_shop_1', [
                            'product' => $product
                        ]) ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <div id="shop-2" class="tab-pane">
                        <?php foreach ($dataProvider->getModels() as $product): ?>
                            <?= $this->render('_product_shop_2', [
                                'product' => $product
                            ]) ?>
                        <?php endforeach; ?>
            </div>
        </div>
        <div class="pro-pagination-style text-center mt-30">
            <?= LinkPager::widget([
                'pagination' => $dataProvider->getPagination(),
                'nextPageLabel' => "<i class='fa fa-angle-double-right'></i>",
                'prevPageLabel' => "<i class='fa fa-angle-double-left'></i>",
                'disabledPageCssClass'=>'disabledPagination',
                'options'=> [],
                'maxButtonCount'=>5
            ]) ?>
        </div>
    </div>
</div>