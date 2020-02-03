<?php

namespace App\Http\Resources;

use App\Category;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->collection->transform(function (Category $category) {
            return (new CategoryResource($category));
        });

        return parent::toArray($request);
    }
}
