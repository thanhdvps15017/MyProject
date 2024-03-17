<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Thêm dữ liệu mẫu cho bảng "product"
        for ($i = 1; $i <= 10; $i++) {
            DB::table('product')->insert([
                'name' => 'Sản phẩm ' . $i,
                'image' => 'path/to/image_' . $i . '.jpg',
                'description' => 'Mô tả chi tiết về sản phẩm ' . $i,
                'type' => 'Loại sản phẩm ' . $i,
                'brand' => 'Thương hiệu ' . $i,
                'size' => 'Kích thước ' . $i,
                'color' => 'Màu sắc ' . $i,
                'price' => 19.99 * $i,
                'quantity' => 50 + $i,
            ]);
        }
    }
}
