<?php


namespace App\Repository;


use App\Product;

class ProductRepository
{
    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function getQuery()
    {
        return $this->model->query();
    }

    public function getRelation($query)
    {
        return $query->with('category');
    }

    public function store($attribute)
    {
        return $this->model->create($attribute);
    }

    public function update($product, $attribute)
    {
        $product->update($attribute);
        return $product;
    }
}
