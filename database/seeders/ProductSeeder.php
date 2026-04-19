<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['name' => 'Laptop Pro', 'description' => 'Laptop de alto rendimiento', 'price' => 1299.99, 'stock' => 10],
            ['name' => 'Mouse Inalámbrico', 'description' => 'Mouse ergonómico', 'price' => 29.99, 'stock' => 50],
            ['name' => 'Teclado Mecánico', 'description' => 'Teclado RGB para gaming', 'price' => 89.99, 'stock' => 25],
            ['name' => 'Monitor 27"', 'description' => 'Monitor 4K UHD', 'price' => 349.99, 'stock' => 15],
            ['name' => 'Auriculares Bluetooth', 'description' => 'Cancelación de ruido', 'price' => 159.99, 'stock' => 30],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }

        $this->command->info('5 productos de prueba creados.');
    }
}