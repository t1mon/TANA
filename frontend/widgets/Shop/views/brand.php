
<div class="sidebar-widget mt-50">
    <h4 class="pro-sidebar-title">Производители</h4>
    <div class="sidebar-widget-tag mt-25">
        <ul>
            <?php foreach ($brands as $brand):?>
            <li><a href="<?=\yii\helpers\Url::to(['shop/catalog/brand', 'id' => $brand['id']])?>" data-method="GET"><?=$brand['name']?></a></li>
            <?php endforeach;?>
        </ul>
    </div>
</div>