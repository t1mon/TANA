<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\widgets\Shop\CategoriesWidget;
use yii\widgets\Menu;
use yii\helpers\Html;
use yii\helpers\Url;

?>
<?php $this->beginContent('@frontend/views/layouts/mainOther.php') ?>
<?php if (Yii::$app->controller->action->id == 'index'):?>
    <?php $this->title = 'Каталог трикотаж и чулочно-носочные изделия в Самаре';
    $this->registerMetaTag([
        'name' => 'keywords',
        'content' => 'трикотаж, чулочно-носочные изделия'
    ]);
    $this->registerMetaTag([
        'name' => 'description',
        'content' => 'У нас большой ассортимент трикотажный и чулочно-носочных изделий! Оптовые продажи без размерных рядов Российских производителей. Более 4 000 моделей в наличии для всей семьи, по фабричным ценам. Новинки каждую неделю.'
    ]);

    ?>

<?php endif;?>


<div class="shop-area pt-95 pb-100">
    <div class="container">
        <div class="row flex-row-reverse">

            <?=$content?>

            <div class="col-lg-3">
                <div class="sidebar-style mr-30">
                    <div class="sidebar-widget">
                        <h4 class="pro-sidebar-title">Поиск</h4>
                        <div class="pro-sidebar-search mb-50 mt-25">
                            <?= \yii\helpers\Html::beginForm(['/shop/catalog/search'], 'get' , ['class'=>'pro-sidebar-search-form']) ?>
                                <input type="text" name="text" placeholder="Текст поиска" />
                                <button>
                                    <i class="pe-7s-search"></i>
                                </button>
                                <?= \yii\helpers\Html::endForm() ?>
                        </div>
                    </div>
                    <div class="sidebar-widget">
                        <h4 class="pro-sidebar-title">Категории </h4>
                        <div class="sidebar-widget-list mt-30">
                            <?= CategoriesWidget::widget([
                                'active' => $this->params['active_category'] ?? null
                            ]) ?>
                        <?= \frontend\widgets\Shop\FilterWidget::widget()?>
                        </div>
                    </div>
                    <?=\frontend\widgets\Shop\BrandWidget::widget()?>
                </div>
            </div>

        </div>
    </div>
</div>
<?php
$script = <<<JS

JS;
$this->registerJs($script,yii\web\View::POS_END);
?>

<?php $this->endContent() ?>
