<?php

namespace App\Repositories;

use App\Contracts\ProductRepositoryInterface;
use App\Models\FruitList;

class ProductRepository implements ProductRepositoryInterface
{

    public function getAll()
    {
        return FruitList::all();
    }

    public function findById($id)
    {
        return FruitList::findOrFail($id);
    }

    public function create(array $data)
    {
        return FruitList::create($data);
    }

    public function update(array $data, $id)
    {
        $product = $this->findById($id);
        $product->update($data);
        return $product;
    }

    public function delete($id)
    {
        $product = $this->findById($id);
        return $product->delete();
    }

}
