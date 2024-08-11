<?php

namespace App\Repositories\Roles;

use App\Repositories\BaseRepository;
use Illuminate\Support\Str;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Role::class;
    }

    public function getRole()
    {
        return $this->model->get();
    }

    public function createRole($display_name, $description, $permission_ids = [])
    {
        // dd($permission_ids);
        $role = $this->model->create([
            'name' => Str::slug($display_name),
            'display_name' => trim($display_name),
            'description' => trim($description),
            'guard_name' => 'web'
        ]);
        $role->permissions()->attach(array_keys($permission_ids));

        return $role;
    }

    public function updateRole($roleModel, $display_name, $description, $permission_ids = [])
    {
        // dd(array_keys(array_filter($permission_ids)));
        $role = $roleModel->update([
            'name' => Str::slug($display_name),
            'display_name' => trim($display_name),
            'description' => trim($description),
        ]);
        if ($role) {
            $roleModel->permissions()->sync(array_keys(array_filter($permission_ids)));
        }

        return $role;
    }
}
