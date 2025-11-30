<?php

namespace App\Repositories;

use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class CartRepository
{
    /**
     * Retrieve the user's open cart or create a new one if it doesn't exist.
     */
    public function getOrCreateCart($userId)
    {
        return Cart::firstOrCreate(
            [
                'user_id' => $userId,
                'status' => 'open'
            ],
            ['total_amount' => 0]
        );
    }

    /**
     * Recalculate and update the cart total based on all cart items.
     */
    public function updateTotal($cartId)
    {
        DB::table('carts')
            ->where('id', $cartId)
            ->update([
                'total_amount' => DB::table('cart_items')
                    ->where('cart_id', $cartId)
                    ->sum('line_total')
            ]);
    }
}
