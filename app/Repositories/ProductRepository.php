<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    /**
     * Retrieve a product by its ID.
     */
    public function find($productId)
    {
        return Product::find($productId);
    }
}
