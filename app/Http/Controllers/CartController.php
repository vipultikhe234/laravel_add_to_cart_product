<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponseHelper;
use App\Http\Requests\AddToCartRequest;
use App\Services\CartService;
use Exception;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    /**
     * Service layer instance for cart-related business logic.
     */
    protected $cartService;

    /**
     * Inject CartService to handle cart operations.
     */
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    /**
     * Add a product to the user's cart.
     */
    public function addToCart(AddToCartRequest $request)
    {
        try {
            return $this->cartService->addToCart($request);
        } catch (Exception $e) {
            Log::error("Add to Cart Controller Error: " . $e->getMessage());
            return ApiResponseHelper::internalServerError();
        }
    }
}
