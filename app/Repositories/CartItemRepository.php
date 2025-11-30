<?php

namespace App\Repositories;

use App\Models\CartItem;
use Illuminate\Support\Facades\DB;

class CartItemRepository
{
    /**
     * Add a product to the cart or update the existing cart item.
     */
    public function addOrUpdate($cartId, $userId, $productId, $qty, $unitPrice, $lineTotal)
    {
        // Check if the cart item already exists for the user and product
        $existing = CartItem::where([
            'cart_id'    => $cartId,
            'product_id' => $productId,
            'user_id'    => $userId
        ])->first();

        // Update quantity and total if item already exists
        if ($existing) {
            $existing->quantity += $qty;
            $existing->line_total = $existing->quantity * $unitPrice;
            $existing->save();
            return $existing;
        }

        // Create new cart item record
        return CartItem::create([
            'cart_id'    => $cartId,
            'product_id' => $productId,
            'user_id'    => $userId,
            'quantity'   => $qty,
            'unit_price' => $unitPrice,
            'line_total' => $lineTotal
        ]);
    }
}
