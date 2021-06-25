<?php

namespace App\Observers;

use App\Category;
use App\Product;
use App\Save;

class ProductObserver
{
    public function creating(Product $product)
    {

    }
    public function created(Product $product)
    {
        $category = Category::where('id', $product->category_id)->first();
        if($product->category_id == 1){
            Save::create([
                'product_id' => $product->id,
                'category' => $category->name,
                'save' => '5 kun'
            ]);
        } else{
            Save::create([
                'product_id' => $product->id,
                'category' => $category->name,
                'save' => '20 kun'
            ]);
        }
    }
}
