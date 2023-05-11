<?php

namespace App\Http\Controllers;

use App\Jobs\SendProductAddedEmailJob;
use App\Models\Cart;
use App\Models\CartItem;
use App\Repository\ProductRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;

class PurchasesController extends Controller
{
    /** @var ProductRepository **/
    private $productRepository;

    public function __construct(ProductRepository $productRepository) {
        $this->productRepository = $productRepository;
    }

    public function showProduct(string $id) {
        try {
            $product = $this->productRepository->findById($id);
        } catch (ModelNotFoundException $ex) {
            
        }
        
        return view('show-product', ['product' => $product]);
    }
    
    public function addToCart(Request $request) {
        $submitData = $request->json()->all();
        $product = $this->productRepository->findById($submitData['productId']);
        
        try {
            $cart = Cart::create([
                'id' => Str::uuid()->toString(),
                'customer_email' => $submitData['email'],
                'created_at' => date("Y-m-d H:i:s")
            ]);

            $cartItem = new CartItem();
            $cartItem->id = Str::uuid()->toString();
            $cartItem->created_at = date("Y-m-d H:i:s");
            $cartItem->product()->associate($product);

            $cart->cartItems()->save($cartItem);
        } catch (\Exception $e) {
            // TODO: Specify all possible error causes
            response()->json(['messageKey' => 'unknown_error'], 400);
        }
        
        dispatch(new SendProductAddedEmailJob($product->name, $cart->customer_email));
        
        return new JsonResponse([], 201);
    }
}
