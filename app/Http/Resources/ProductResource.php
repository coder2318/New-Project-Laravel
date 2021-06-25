<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id??null,
            'name' => $this->name??null,
            'price' => $this->price??null,
            'category' => $this->category ?  $this->category->name : null
        ];
    }


}
