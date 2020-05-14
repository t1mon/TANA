<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
?>
<ul>
    <li>
        <div class="sidebar-widget-list-left">
            <?php $getSale = \Yii::$app->request->get('sale'); ?>
            <input type="checkbox" value="<?=Html::encode(Url::current(['sale' => !$getSale ?: null])) ?>" onchange="location = this.value" <?php if($getSale) echo 'checked' ?>> <a id="filter-sale" href="#.">Распродажа <span><?=$sale?></span> </a>
            <span class="checkmark"></span>
        </div>
    </li>
    <li>
        <div class="sidebar-widget-list-left">
            <?php $getNew = \Yii::$app->request->get('new'); ?>

            <input type="checkbox" value="<?=Html::encode(Url::current(['new' => !$getNew ?: null])) ?>" onchange="location = this.value" <?php if($getNew) echo 'checked' ?> > <a id="filter-new" href="#.">Новинка <span><?=$new?></span></a>
            <span class="checkmark"></span>
        </div>
    </li>
</ul>

<?php
$script = <<<JS

function check(event){
    event.preventDefault()
    this.previousElementSibling.checked = this.previousElementSibling.checked ? false : true
    location = this.previousElementSibling.value
}
   var new_ = document.getElementById('filter-new').addEventListener('click',check)
   var sale = document.getElementById('filter-sale').addEventListener('click',check)
   
   

JS;

$this->registerJs($script,\yii\web\View::POS_READY);
?>