<?php

namespace shop\cart;

use shop\entities\Shop\Product\Modification;
use shop\entities\Shop\Product\Product;

class CartItem
{
    private $product;
    private $modificationId;
    private $quantity;
    private $comment;

    public function __construct(Product $product, $modificationId, $quantity, $comment)
    {
//        if (!$product->canBeCheckout($modificationId, $quantity)) {
//            $count = $product->getModification($modificationId)->quantity;
//            throw new \DomainException("Вводимое количество превышает отстаток продукта. Доступно всего $count шт.");
//        }

        $this->product = $product;
        $this->modificationId = $modificationId;
        $this->quantity = $quantity;
        $this->comment = $comment;
    }

    public function getId(): string
    {
        return md5(serialize([(int)$this->product->id, (int)$this->modificationId]));
    }

    public function getProductId(): int
    {
        return $this->product->id;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function getModificationId(): ?int
    {
        return $this->modificationId;
    }

    public function getModification(): ?Modification
    {
        if ($this->modificationId) {

            return $this->product->getModification($this->modificationId);
        }
        return null;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getPrice(): float
    {
        if ($this->modificationId) {
            return $this->product->getModificationPrice($this->modificationId);
        }
        return $this->product->price_new;
    }

    public function getWeight(): int
    {
        return $this->product->weight * $this->quantity;
    }

    public function getCost(): float
    {
        return $this->getPrice() * $this->quantity;
    }

    public function getComment(): string
    {
        return $this->comment;
    }

    public function plus($quantity)
    {
        return new static($this->product, $this->modificationId, $this->quantity + $quantity, $this->comment);
    }

    public function changeQuantity($quantity)
    {
        return new static($this->product, $this->modificationId, $quantity, $this->comment);
    }

    public function setComment($comment)
    {
        return new static($this->product, $this->modificationId, $this->quantity, $comment);
    }
}