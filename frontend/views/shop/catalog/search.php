<?php

$this->title = 'Поиск по каталогу';

$this->params['breadcrumbs'][] = $this->title;
?>
<?php if ($dataProvider != null):?>
    <?= $this->render('_list', [
        'dataProvider' => $dataProvider
    ]) ?>
<?php endif;?>