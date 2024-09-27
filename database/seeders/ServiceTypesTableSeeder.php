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
                'id' => 1,
                'title_vi' => 'Sản phẩm',
                'title_en' => 'Product',
                'slug' => 'san-pham',
                'type' => 'product',
                'parent_id' => 0,
            ],
            [
                'id' => 2,
                'title_vi' => 'Dịch vụ',
                'title_en' => 'Service',
                'slug' => 'dich-vu',
                'type' => 'service',
                'parent_id' => 0,
            ],
            [
                'id' => 3,
                'title_vi' => 'Ôtô Mitshubishi',
                'title_en' => 'Mitshubishi',
                'slug' => 'oto-mitshubishi',
                'type' => 'product',
                'parent_id' => 1,
            ],
            [
                'id' => 4,
                'title_vi' => 'Dịch vụ bãi',
                'title_en' => 'Warehouse bussiness',
                'slug' => 'dich-vu-bai',
                'type' => 'service',
                'parent_id' => 2,
            ],
            [
                'id' => 5,
                'title_vi' => 'Dịch vụ bảo dưỡng và sửa chữa ôtô',
                'title_en' => 'Maintenance and repair service',
                'slug' => 'dich-vu-bao-duong-va-sua-chua-oto',
                'type' => 'service',
                'parent_id' => 2,
            ],
        ];

        ServiceType::truncate();
        ServiceType::insert($data);
    }
}
