<?php

namespace Database\Seeders;

use App\Models\Footer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $footer = [
            'address' => '51 Phan Đăng Lưu, Hòa Cường Nam, Quận Hải Châu, TP. Đà Nẵng',
            'phone' => '(84-236) 3821637 - 3823487',
            'email' => 'thanhpvmdaesco@gmail.com',
            'created_at' => '2024-07-16 03:36:43',
            'updated_at' => '2024-07-16 03:36:43',
        ];

        Footer::create($footer);
    }
}
