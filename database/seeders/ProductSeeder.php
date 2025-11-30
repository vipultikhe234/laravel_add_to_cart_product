<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name'        => 'Apple iPhone 15',
                'slug'        => Str::slug('Apple iPhone 15'),
                'sku'         => 'IP15-' . rand(1000, 9999),
                'description' => 'Latest Apple smartphone with A16 chip.',
                'price'       => 79999.00,
                'stock'       => 10,
                'is_active'   => true,
            ],
            [
                'name'        => 'Samsung Galaxy S23',
                'slug'        => Str::slug('Samsung Galaxy S23'),
                'sku'         => 'SGS23-' . rand(1000, 9999),
                'description' => 'Flagship Android smartphone from Samsung.',
                'price'       => 74999.00,
                'stock'       => 15,
                'is_active'   => true,
            ],
            [
                'name'        => 'Sony WH-1000XM5 Headphones',
                'slug'        => Str::slug('Sony WH-1000XM5 Headphones'),
                'sku'         => 'SONYXM5-' . rand(1000, 9999),
                'description' => 'Premium active noise cancelling headphones.',
                'price'       => 29999.00,
                'stock'       => 20,
                'is_active'   => true,
            ],
            [
                'name'        => 'Dell Inspiron Laptop',
                'slug'        => Str::slug('Dell Inspiron Laptop'),
                'sku'         => 'DELLINSP-' . rand(1000, 9999),
                'description' => 'High-performance laptop suitable for work.',
                'price'       => 58999.00,
                'stock'       => 8,
                'is_active'   => true,
            ],
            [
                'name'        => 'Boat Airdopes 121v2',
                'slug'        => Str::slug('Boat Airdopes 121v2'),
                'sku'         => 'BOAT121-' . rand(1000, 9999),
                'description' => 'Budget-friendly true wireless earbuds.',
                'price'       => 1299.00,
                'stock'       => 50,
                'is_active'   => true,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
