<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductCollection;
use App\Http\Resources\Products;
use App\Product;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * List all products.
     *
     * @return ProductCollection
     */
    public function index()
    {
        return new ProductCollection(Product::all());
    }
}
