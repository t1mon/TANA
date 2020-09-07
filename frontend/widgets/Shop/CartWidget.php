<?php

namespace frontend\widgets\Shop;

use shop\cart\Cart;
use yii\base\Widget;

class CartWidget extends Widget
{
    private $cart;

    public function __construct(Cart $cart, $config = [])
    {
        parent::__construct($config);
        $this->cart = $cart;
    }

    public function run(): string
    {
        try {
            return $this->render('cart', [
                'cart' => $this->cart,
            ]);
        }catch ( \DomainException $e){
            $this->cart->clear();
            \Yii::$app->errorHandler->logException($e);
            \Yii::$app->session->setFlash('error', $e->getMessage());
            return false;
        }
    }
}