<?php

namespace shop\repositories\Shop;

use shop\dispatchers\EventDispatcher;
use shop\entities\Shop\Product\Product;
use shop\repositories\events\EntityPersisted;
use shop\repositories\events\EntityRemoved;
use shop\repositories\NotFoundException;

class ProductRepository
{
    /*private $dispatcher;

    public function __construct(EventDispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }*/

    public function get($id)
    {
        if (!$product = Product::findOne($id)) {
            throw new NotFoundException('Product is not found.');
        }
        return $product;
    }

    public function existsByBrand($id)
    {
        return Product::find()->andWhere(['brand_id' => $id])->exists();
    }

    public function existsByMainCategory($id)
    {
        return Product::find()->andWhere(['category_id' => $id])->exists();
    }

    public function save(Product $product)
    {
        if (!$product->save()) {
            throw new \RuntimeException('Saving error.');
        }
        $this->dispatcher->dispatchAll($product->releaseEvents());
        $this->dispatcher->dispatch(new EntityPersisted($product));
    }

    public function remove(Product $product)
    {
        if (!$product->delete()) {
            throw new \RuntimeException('Removing error.');
        }
        $this->dispatcher->dispatchAll($product->releaseEvents());
        $this->dispatcher->dispatch(new EntityRemoved($product));
    }
}