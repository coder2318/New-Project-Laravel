<?php


namespace App\Services;


use App\Repository\ProductRepository;

class ProductService
{
    protected $repo;

    public function __construct(ProductRepository $repo)
    {
        $this->repo = $repo;
    }

    public function get($request)
    {
        $product  = $this->repo->getQuery();
        $product = $this->repo->getRelation($product);
        $product = $this->filter($product, $request);
        $product = $this->order($product, 'id', 'desc');
        $product = $product->get();
        return  $product;
    }

    public function filter($query, $request)
    {
        if($request->name){
            $query = $query->where('name', 'like', "%".$request->name."%");
        }

        return $query;
    }

    public function order($query, $sortBy, $sortType)
    {
        return $query->orderBy($sortBy, $sortType);
    }

    public function create($request)
    {
        $params = $request->validated();
        $_SESSION['lang'] = $_GET['leng'];
        session('lang', $request->lang);
        $product = $this->repo->store($params);
        if($product)
            return $product;
        else
            return 'not created';
    }

    public function edit($query, $request)
    {
        $params = $request->validated();
        $product = $this->repo->update($query, $params);
        if($product)
            return $product;
        else
            return 'not updated';
    }
}
