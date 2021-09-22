<?php

namespace App\Basket;

use App\Basket\Exceptions\QuantityExceededException;
use App\Models\Product;
use App\Support\Storage\CartStorage;

class Basket
{
    /**
     * @param Product $product
     * @return bool
     */
    public function has(Product $product)
    {
        return CartStorage::exist($product->id);
    }

    /**
     * @param Product $product
     * @param int $quantity
     * @throws QuantityExceededException
     */
    public function add(Product $product, int $quantity)
    {
        if ($this->has($product)) {
            $quantity = CartStorage::get($product->id)['quantity'] + $quantity;
        }

        $this->update($product, $quantity);
    }

    /**
     * @param Product $product
     * @param int $quantity
     * @throws QuantityExceededException
     */
    public function update(Product $product, int $quantity)
    {
        if (!Product::find($product->id)->hasStock($quantity)) {
            throw new QuantityExceededException();
        }

        if ($quantity <= 0) {
            $this->remove($product);
            return;
        }

        CartStorage::set($product->id, [
            'product_id' => (int)$product->id,
            'quantity' => $quantity
        ]);
    }

    /**
     * @param Product $product
     */
    public function remove(Product $product)
    {
        CartStorage::unset($product->id);
    }

    /**
     * @param Product $product
     * @return mixed
     */
    public function get(Product $product)
    {
        return CartStorage::get($product->id);
    }

    /**
     * @void
     */
    public function clear()
    {
        CartStorage::clear();
    }

    /**
     * @return array
     */
    public function all(): array
    {
        $ids = [];
        $items = [];

        foreach (CartStorage::all() as $product) {
            array_push($ids, $product['product_id']);
        }

        $products = Product::find($ids);

        foreach ($products as $product) {
            $product->quantity = $this->get($product)['quantity'];
            array_push($items, $product);
        }

        return $items;
    }

    /**
     * @return int
     */
    public function itemCount(): int
    {
        return CartStorage::count();
    }

    public function refresh()
    {
        foreach ($this->all() as $product) {
            if (!$product->hasStock($product->quantity)) {
                $this->update($product, $product->stock);
            } else if ($product->hasStock(1) && $product->quantity === 0) {
                $this->update($product, 1);
            }
        }
    }

    /**
     * @return float|int
     */
    public function subTotal()
    {
        $total = 0;

        foreach ($this->all() as $product)
        {
            if($product->outOfStock())
            {
                continue;
            }

            $total += $product->price * $product->quantity;
        }

        return $total;
    }
}
