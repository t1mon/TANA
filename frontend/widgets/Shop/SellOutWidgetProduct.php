<?php

namespace frontend\widgets\Shop;

use shop\readModels\Shop\ProductReadRepository;
use yii\base\Widget;

class SellOutWidgetProduct extends Widget
{
    public $limit;
    public $trigger;

    private $repository;

    public function __construct(ProductReadRepository $repository, $config = [])
    {
        parent::__construct($config);
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->render('sell-out', [
            'products' => $this->repository->getFeatured($this->limit, $this->trigger)
        ]);
    }
}