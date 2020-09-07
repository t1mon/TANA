<?php

namespace shop\readModels\Shop;

use shop\entities\Shop\Brand;

class BrandReadRepository
{
    public function find($id): ?Brand
    {
        return Brand::findOne($id);
    }

    public function getAll(): array
    {
        return Brand::find()->orderBy(['name' => 'ASC'])->asArray()->all();
    }
}