<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\{StoreRequest, UpdateRequest};
use App\Http\Resources\ProductResource;
use App\Product;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::query()->with('category');
        if($request->name){
            $products = $products->where('name', 'like', '%'.$request->name.'%');
        }
        $products = $products->get();
//        $products= null;
        if($products){
            $products = ProductResource::collection($products);
            return response()->successJson($products);
        } else{
            return response()->errorJson('product not found', 404);

        }
    }

    public function store(StoreRequest $request)
    {
        $params = $request->validated();
        $product = Product::create($params);
        return response()->json(['product' => $product]);
    }

    public function update(UpdateRequest $request, Product $product)
    {
        $params = $request->validated();
        $product = $product->update($params);
        return response()->successJson($product);
    }

    public function show(Product $product)
    {
        $product->category;
        if($product){
            $products = new ProductResource($product);
            return response()->successJson($products);
        } else{
            return response()->errorJson('product not found', 404);

        }
    }

    public function curl()
    {
        $client = new Client();

        $url = 'http://newproject.loc/api/products';

//        $result = $client->get($url,[
//            'query' => [
//                'name' => 'olma'
//            ]
//        ]);
        $result  =$client->post($url, [
            'form_params' => [
                'name' => 'gilos',
                'price' => 12122,
                'quantity' => 12,
                'category_id' => 1
            ]
        ]);
        dd(json_decode($result->getBody(), true));

    }

    public static function test()
    {
        $products = Product::where('name', 'like', '%avokad%')->get();
        foreach ($products as $item){
            $item->update(['name' => 'boshqadur']);
        }
        echo 'successfully';
    }

}
