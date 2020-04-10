<li>
 <?php if (!empty($category['children'])) : ?>
    <a href='#'><?=$category['name']?></a>
    <ul><?php $this->getMenuHtml($category['children']); ?></ul>
    <?php else :?>
    <a href="<?=\yii\helpers\Url::to(['/shop/catalog/category', 'id' => $category['id']])?>"> <?=$category['name'] ?> </a>
    <?php endif;?>
</li>