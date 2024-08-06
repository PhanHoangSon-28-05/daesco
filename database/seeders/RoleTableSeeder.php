<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            [
                'name' => 'admin',
                'email' => 'admin@gmail',
                'username' => 'admin',
                'password' => '12345678',
            ]
        );
        $roles = [
            [
                'name' => 'quan-li',
                'display_name' => 'Quản lí'
            ],

            [
                'name' => 'nhan-vien',
                'display_name' => 'Nhân viên'
            ]

        ];

        foreach ($roles as $role) {
            Role::updateOrCreate($role);
        }

        $permissions = [
            ['name' => 'create-account', 'display_name' => 'Tạo', 'group' => 'Account'],
            ['name' => 'update-account', 'display_name' => 'Cập nhập', 'group' => 'Account'],
            ['name' => 'show-account', 'display_name' => 'Xem', 'group' => 'Account'],
            ['name' => 'delete-account', 'display_name' => 'Xóa', 'group' => 'Account'],

            ['name' => 'create-role', 'display_name' => 'Tạo', 'group' => 'Role'],
            ['name' => 'update-role', 'display_name' => 'Cập nhập', 'group' => 'Role'],
            ['name' => 'show-role', 'display_name' => 'Xem', 'group' => 'Role'],
            ['name' => 'delete-role', 'display_name' => 'Xóa', 'group' => 'Role'],

        ];

        $role = Role::where('name', 'quan-li')->first();
        foreach ($permissions as $permission) {
            Permission::updateOrCreate($permission);
            // dd($permission['name']);
            $role->givePermissionTo($permission['name']);
        }
    }
}
