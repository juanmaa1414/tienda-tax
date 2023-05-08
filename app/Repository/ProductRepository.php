<?php

namespace App\Repository;

use App\Models\Product;

class ProductRepository {
    
    /**
     * @throws Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findById(string $id): Product {
        return Product::findOrFail($id);
    }
}
