<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Variant;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // PRODUCT 1
        $product1 = Product::create([
            'name' => 'Asus ROG Strix',
            'price' => 18500000
        ]);

        Variant::create([
            'name' => 'Gaming RTX 4060',
            'description' => 'Laptop gaming performa tinggi',
            'processor' => 'Intel i7 Gen 13',
            'memory' => '16 GB',
            'storage' => '1 TB SSD',
            'product_id' => $product1->id
        ]);

        Variant::create([
            'name' => 'Gaming RTX 4050',
            'description' => 'Laptop gaming menengah',
            'processor' => 'Intel i5 Gen 13',
            'memory' => '16 GB',
            'storage' => '512 GB SSD',
            'product_id' => $product1->id
        ]);

        // PRODUCT 2
        $product2 = Product::create([
            'name' => 'MacBook Air M2',
            'price' => 21000000
        ]);

        Variant::create([
            'name' => '256 GB',
            'description' => 'MacBook ringan dan hemat baterai',
            'processor' => 'Apple M2',
            'memory' => '8 GB',
            'storage' => '256 GB SSD',
            'product_id' => $product2->id
        ]);

        Variant::create([
            'name' => '512 GB',
            'description' => 'MacBook untuk multitasking',
            'processor' => 'Apple M2',
            'memory' => '16 GB',
            'storage' => '512 GB SSD',
            'product_id' => $product2->id
        ]);

        // PRODUCT 3
        $product3 = Product::create([
            'name' => 'Lenovo Legion 5',
            'price' => 17500000
        ]);

        Variant::create([
            'name' => 'Ryzen Edition',
            'description' => 'Laptop gaming AMD Ryzen',
            'processor' => 'Ryzen 7 7840HS',
            'memory' => '16 GB',
            'storage' => '1 TB SSD',
            'product_id' => $product3->id
        ]);

        // PRODUCT 4
        $product4 = Product::create([
            'name' => 'Acer Nitro V',
            'price' => 14500000
        ]);

        Variant::create([
            'name' => 'Entry Gaming',
            'description' => 'Gaming untuk mahasiswa',
            'processor' => 'Intel i5 Gen 12',
            'memory' => '8 GB',
            'storage' => '512 GB SSD',
            'product_id' => $product4->id
        ]);

        // PRODUCT 5
        $product5 = Product::create([
            'name' => 'HP Pavilion',
            'price' => 12000000
        ]);

        Variant::create([
            'name' => 'Office Edition',
            'description' => 'Laptop kerja dan kuliah',
            'processor' => 'Ryzen 5',
            'memory' => '8 GB',
            'storage' => '512 GB SSD',
            'product_id' => $product5->id
        ]);
    }
}