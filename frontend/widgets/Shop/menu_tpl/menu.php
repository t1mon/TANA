<li>
    <?php isset($category['children']) ? $url = '#' : $url = \yii\helpers\Url::to(['/shop/catalog/category', 'id' => $category['id']]) ?>
    <a href="<?=$url?>">

            <?= $category['name'] ?>
            <?php if (isset($category['children'])):?>

            <ul>
                <?php $this->getMenuHtml($category['children'])?>
            </ul>

            <?php endif;?>
    </a>
</li>