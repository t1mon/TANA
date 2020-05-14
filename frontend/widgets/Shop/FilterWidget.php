<?php
/**
 * Created by PhpStorm.
 * User: dmitri
 * Date: 14/05/2020
 * Time: 20:07
 */

namespace frontend\widgets\Shop;


use shop\readModels\Shop\ProductReadRepository;
use yii\base\Widget;

class FilterWidget extends Widget
{
    private $repository;

    public function __construct(ProductReadRepository $repository, $config = [])
    {
        parent::__construct($config);
        $this->repository = $repository;
    }

    public function run()
    {
        $queryParams = \Yii::$app->request->queryParams;

        return $this->render('filter', [
            'new' => $this->repository->filterCount('new', $queryParams),
            'sale' => $this->repository->filterCount('sale', $queryParams),
        ]);
    }

}