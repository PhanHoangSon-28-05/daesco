<?php

namespace Database\Seeders;

use App\Models\Header;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $header = [
            'hotline' => '0903525526',
            'email' => 'thanhpvmdaesco@gmail.com',
            'facebook' => 'https://www.facebook.com/qmanh1',
            'created_at' => '2024-07-16 03:36:18',
            'updated_at' => '2024-07-16 03:36:18',
        ];

        Header::create($header);
    }
}
