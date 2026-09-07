<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    public function run(): void
    {
        $categories = ['Elektronik', 'Pakaian', 'Makanan', 'Minuman', 'Buku', 'Peralatan Rumah Tangga'];

        foreach ($categories as $category) {
            Product::factory()->create([
                'category' => $category,
            ]);
        }
    }
}