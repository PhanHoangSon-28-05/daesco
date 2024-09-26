<?php

namespace Database\Seeders;

use App\Models\ServiceType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'title_vi' => 'Dịch vụ bãi',
                'title_en' => 'Warehouse service',
                'slug' => 'dich-vu-bai',
            ],
            [
                'title_vi' => 'Dịch bảo dưỡng & sửa chữa ô tô',
                'title_en' => 'Car maintenance & repair service',
                'slug' => 'dich-vu-bao-duong-va-sua-chua-oto'
            ],
        ];

        ServiceType::truncate();
        ServiceType::insert($data);
    }
}
