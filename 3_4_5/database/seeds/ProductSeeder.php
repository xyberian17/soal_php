<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'nama_produk' => 'Aqua',
                'image' => 'default.png',
                'harga' => 5000,
                'stock' => 20
            ],
            [
                'nama_produk' => 'Teh Botol',
                'image' => 'default.png',
                'harga' => 7000,
                'stock' => 15
            ],
            [
                'nama_produk' => 'Sprite',
                'image' => 'default.png',
                'harga' => 7000,
                'stock' => 15
            ],
            [
                'nama_produk' => 'Coca Cola',
                'image' => 'default.png',
                'harga' => 7000,
                'stock' => 15
            ],
            [
                'nama_produk' => 'Fanta',
                'image' => 'default.png',
                'harga' => 7000,
                'stock' => 15
            ],
            [
                'nama_produk' => 'Mizone',
                'image' => 'default.png',
                'harga' => 10000,
                'stock' => 15
            ],
            [
                'nama_produk' => 'Pocari Sweat',
                'image' => 'default.png',
                'harga' => 10000,
                'stock' => 15
            ]
        ];
        Product::insert($products);
    }
}
