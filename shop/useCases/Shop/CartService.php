<?php

namespace shop\useCases\Shop;

use shop\cart\Cart;
use shop\cart\CartItem;
use shop\repositories\Shop\ProductRepository;
use yii\helpers\StringHelper;

class CartService
{
    private $cart;
    private $products;

    public function __construct(Cart $cart, ProductRepository $products)
    {
        $this->cart = $cart;
        $this->products = $products;
    }

    public function getCart(): Cart
    {
        return $this->cart;
    }

    public function add($productId, $modificationId, $quantity): void
    {
        $product = $this->products->get($productId);
        if (!$product->price_new)
            throw new \ErrorException('Price is NULL');
        $modId = $modificationId ? $product->getModification($modificationId)->id : null;
        $this->cart->add(new CartItem($product, $modId, $quantity,''));
    }

    public function set($id, $quantity): void
    {
        if(!$quantity)
            throw new \DomainException('<strong>Ошибка!</strong> Проверьте вводимое количество продукта');
        $this->cart->set($id, $quantity);
    }

    public function setComment($id, $comment): void
    {
        $this->cart->setComment($id, $comment);
    }

    public function remove($id): void
    {
        $this->cart->remove($id);
    }

    public function clear(): void
    {
        $this->cart->clear();
    }
}