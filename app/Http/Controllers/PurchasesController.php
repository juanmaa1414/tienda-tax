<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class PurchasesController extends Controller
{
    
    
    public function showProduct(string $productId) {
        try {
            $product = $this->productRepository->findById($productId);
        } catch (ModelNotFoundException $ex) {
            
        }
        
        return view('show-product', ['name' => 'Samantha']);
    }
}
