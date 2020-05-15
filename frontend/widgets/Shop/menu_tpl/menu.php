<li>
 <?php if (!empty($category['children'])) : ?>
    <?php if ($category['name'] == 'Новый каталог') $category['name'] = 'По категориям'?>
    <a href='#'><?=$category['name']?></a>
    <ul><?php $this->getMenuHtml($category['children']); ?></ul>
    <?php else :?>
    <a href="<?=\yii\helpers\Url::to(['/shop/catalog/category', 'id' => $category['id']])?>"> <?=$category['name'] ?> </a>
    <?php endif;?>
</li>