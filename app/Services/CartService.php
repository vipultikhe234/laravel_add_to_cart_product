<?php

namespace App\Services;

use App\Helpers\ApiResponseHelper;
use App\Repositories\CartRepository;
use App\Repositories\CartItemRepository;
use App\Repositories\ProductRepository;
use Exception;

class CartService
{
    /**
     * Repository instances for handling cart, cart items, and product operations.
     */
    protected $cartRepository;
    protected $cartItemRepository;
    protected $productRepository;

    /**
     * Inject required repositories for cart processing.
     */
    public function __construct(CartRepository $cartRepository, CartItemRepository $cartItemRepository, ProductRepository $productRepository)
    {
        $this->cartRepository = $cartRepository;
        $this->cartItemRepository = $cartItemRepository;
        $this->productRepository = $productRepository;
    }

    /**
     * Add a product to the authenticated user's cart.
     */
    public function addToCart($request)
    {
        try {
            $userId = auth()->id();
            $product = $this->productRepository->find($request->product_id);
            $cart = $this->cartRepository->getOrCreateCart($userId);

            // Calculate pricing details
            $unitPrice = $product->price;
            $lineTotal = $unitPrice * $request->quantity;

            // Create or update the cart item
            $cartItem = $this->cartItemRepository->addOrUpdate(
                $cart->id,
                $userId,
                $product->id,
                $request->quantity,
                $unitPrice,
                $lineTotal
            );

            // Refresh cart total amount
            $this->cartRepository->updateTotal($cart->id);
            $message = __('message.PRODUCT_CART');
            return ApiResponseHelper::success($message, ['cart_item' => $cartItem]);
        } catch (Exception $e) {
            return ApiResponseHelper::internalServerError();
        }
    }
}
