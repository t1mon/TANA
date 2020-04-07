<?php foreach ($categories as $category): ?>
    <li>
    <?php if ($category->getChildren()->all()): ?>
        <a href='#'><?=$category->name?></a>
        <ul>
            <?php $home->cate($category); ?>
        </ul>
        <?php else:?>
        <a href='<?php \yii\helpers\Url::to(['/shop/catalog/category', 'id' => $child->id]) ?>'><?=$category->name?></a>
    <?php endif;?>
    </li>
<?php endforeach;?>