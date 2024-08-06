<?php

namespace Database\Seeders;

use App\Models\Info_product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InfoProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $infoProduct = [
            'company_name' => 'Công ty CP Máy Thiết Bị Dầu khí Đà Nẵng ----Địa Chỉ ;51 Phan Đăng Lưu- Hòa Cường Nam-Quận Hải Châu- Tp Đà Nẵng',
            'phone' => 'Điện thoại: 0236 3821637- 0903525526',
            'email' => 'Email: pvmdaesco@gmail.com',
            'created_at' => '2024-07-16 03:37:03',
            'updated_at' => '2024-07-16 03:37:03',
        ];

        Info_product::create($infoProduct);
    }
}
