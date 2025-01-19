<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Laptop Gaming XYZ',
                'description' => 'Laptop gaming dengan spesifikasi tinggi. Dilengkapi dengan prosesor terbaru, RAM 16GB, dan SSD 512GB.',
                'price' => 15000000,
                'stock' => 10,
                'image' => 'https://cdn.antaranews.com/cache/1200x800/2023/03/05/00.jpg'
            ],
            [
                'name' => 'Smartphone ABC Pro',
                'description' => 'Smartphone dengan kamera 108MP, layar AMOLED 6.7 inch, dan baterai 5000mAh.',
                'price' => 8000000,
                'stock' => 15,
                'image' => 'https://images.samsung.com/is/image/samsung/assets/id/smartphones/galaxy-s24-ultra/buy/01_S24Ultra-Group-KV_PC_0527_final.jpg?imbypass=true'
            ],
            [
                'name' => 'Smart Watch Series X',
                'description' => 'Smartwatch dengan fitur monitoring kesehatan lengkap, tahan air, dan baterai tahan hingga 7 hari.',
                'price' => 3500000,
                'stock' => 20,
                'image' => 'https://via.placeholder.com/400x300'
            ],
            [
                'name' => 'Wireless Earbuds Pro',
                'description' => 'Earbuds dengan noise cancelling, kualitas suara premium, dan baterai tahan 24 jam.',
                'price' => 2000000,
                'stock' => 25,
                'image' => 'https://via.placeholder.com/400x300'
            ],
            [
                'name' => 'Camera Mirrorless Elite',
                'description' => 'Kamera mirrorless 24MP, 4K video, stabilisasi gambar, dan lensa kit 18-55mm.',
                'price' => 12000000,
                'stock' => 8,
                'image' => 'https://via.placeholder.com/400x300'
            ],
            [
                'name' => 'Gaming Console NextGen',
                'description' => 'Konsol gaming next-gen dengan dukungan 4K gaming, SSD ultra cepat, dan controller wireless.',
                'price' => 7500000,
                'stock' => 12,
                'image' => 'https://via.placeholder.com/400x300'
            ],
            [
                'name' => 'Tablet Pro 2024',
                'description' => 'Tablet dengan layar 11 inch, chipset terbaru, mendukung stylus, dan keyboard magnetic.',
                'price' => 9000000,
                'stock' => 18,
                'image' => 'https://via.placeholder.com/400x300'
            ],
            [
                'name' => 'Smart Speaker AI',
                'description' => 'Speaker pintar dengan asisten AI, suara surround, dan integrasi smart home.',
                'price' => 1500000,
                'stock' => 30,
                'image' => 'https://via.placeholder.com/400x300'
            ],
            [
                'name' => 'Wireless Keyboard Mechanical',
                'description' => 'Keyboard mekanik wireless dengan switch Cherry MX, RGB backlight, dan baterai tahan lama.',
                'price' => 1800000,
                'stock' => 22,
                'image' => 'https://via.placeholder.com/400x300'
            ],
            [
                'name' => 'Power Bank 20000mAh',
                'description' => 'Power bank dengan kapasitas 20000mAh, fast charging, dan mendukung berbagai device.',
                'price' => 500000,
                'stock' => 40,
                'image' => 'https://via.placeholder.com/400x300'
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
