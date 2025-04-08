<?php

namespace App\Providers;

use App\Contracts\ProductRepositoryInterface;
use App\Repositories\ProductRepository;

class ProductService
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        return $this->productRepository = $productRepository;
    }

    public function getAllProducts()
    {
        return $this->productRepository->getAll();
    }

    public function getProductById($id)
    {
        return $this->productRepository->findById($id);
    }

    public function createProduct(array $data)
    {
        return $this->productRepository->create($data);
    }

    public function updateProduct(array $data, $id)
    {
        return $this->productRepository->update($data, $id);
    }

    public function deleteProduct($id)
    {
        return $this->productRepository->delete($id);
    }
}
