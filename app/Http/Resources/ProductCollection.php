<?php

namespace App\Http\Resources;

use App\Product;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->collection->transform(function (Product $product) {
            return (new ProductResource($product));
        });

        return parent::toArray($request);
    }
}
