<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'id' => 3,
                'parent_id' => 0,
                'tatus' => 1,
                'name_vi' => 'Quan hệ cổ đông',
                'name_en' => 'Shareholders',
                'lug' => 'hareholders',
                'created_at' => '2023-11-02 14:53:49',
                'updated_at' => '2023-11-02 14:53:49',
            ],
            [
                'id' => 4,
                'parent_id' => 3,
                'tatus' => 1,
                'name_vi' => 'Tin tức',
                'name_en' => 'Company Regulations and Regulations',
                'lug' => 'company-regulations-and-regulations',
                'created_at' => '2023-11-02 14:53:49',
                'updated_at' => '2023-11-02 14:53:49',
            ],
            //... add the rest of the categories here...
            [
                'id' => 53,
                'parent_id' => 0,
                'tatus' => 2,
                'name_vi' => 'Dịch vụ cho thuê kho bãi',
                'name_en' => 'Warehouse office for rent',
                'lug' => 'warehouse-office-for-rent',
                'created_at' => '2022-06-07 01:57:00',
                'updated_at' => '2023-11-02 14:53:49',
            ],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate($category);
        }
    }
}
