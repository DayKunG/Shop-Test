<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'เสื้อยืด',
                'description' => 'เสื้อยืดผ้าฝ้ายคุณภาพดี สวมใส่สบาย',
                'price' => 299.00,
                'stock' => 50,
            ],
            [
                'name' => 'กางเกงยีนส์',
                'description' => 'กางเกงยีนส์สไตล์คลาสสิก ใส่ได้ทุกโอกาส',
                'price' => 899.00,
                'stock' => 30,
            ],
            [
                'name' => 'รองเท้าผ้าใบ',
                'description' => 'รองเท้าผ้าใบสวมใส่สบาย เหมาะสำหรับทุกกิจกรรม',
                'price' => 1299.00,
                'stock' => 25,
            ],
            [
                'name' => 'กระเป๋าเป้',
                'description' => 'กระเป๋าเป้คุณภาพดี พร้อมช่องเก็บของมากมาย',
                'price' => 599.00,
                'stock' => 40,
            ],
            [
                'name' => 'นาฬิกาข้อมือ',
                'description' => 'นาฬิกาข้อมือสไตล์โมเดิร์น ดูดีมีสไตล์',
                'price' => 1999.00,
                'stock' => 15,
            ],
            [
                'name' => 'แว่นตากันแดด',
                'description' => 'แว่นตากันแดดป้องกันรังสียูวี ดีไซน์ทันสมัย',
                'price' => 399.00,
                'stock' => 35,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
