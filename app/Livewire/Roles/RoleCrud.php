<?php

namespace App\Livewire\Roles;

use App\Models\Role;
use App\Repositories\Roles\RoleRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;

class RoleCrud extends Component
{
    public $action,
        $role,
        $description,
        $permission_ids = [];

    #[Validate('required|string|max:255', message: 'Chưa nhập tên')]
    public string $display_name;

    public function modalSetup($id)
    {
        if ($id == 0) {
            $this->action = 'create';
        } elseif ($id > 0) {
            $this->action = 'update';
        } else {
            $this->action = 'delete';
        }
        // dd($id);
        $this->role = Role::find(abs($id));

        $this->getData($id);
    }


    public function getData($id)
    {
        // dd($this->role);
        if ($this->role) {
            $this->display_name = $this->role->display_name;
            $this->description = $this->role->description;

            $this->permission_ids =  array_fill_keys(DB::table('permissions')->whereNotIn('id', function ($query)  use ($id) {
                $query->select('permission_id')
                    ->from('role_has_permissions')->where('role_id', $id);
            })->pluck('id')->toArray(), false);

            foreach (array_fill_keys($this->role->permissions()->pluck('id')->toArray(), true) as $key => $value) {
                $this->permission_ids[$key] =  $value;
            }
        } else {
            $this->display_name = '';
            $this->description = '';
            $this->permission_ids = [];
        }

        $this->resetErrorBag();
    }

    public function create(RoleRepositoryInterface $roleRepo)
    {
        $this->validate();
        $role = $roleRepo->createRole($this->display_name, $this->description, $this->permission_ids);

        $this->dispatch('refreshList')->to('roles.role-list');
        $this->dispatch('closeCrudRole');
    }

    public function update(RoleRepositoryInterface $roleRepo)
    {
        $this->validate();

        $roleRepo->updateRole($this->role, $this->display_name, $this->description, $this->permission_ids);

        $this->dispatch('refreshList')->to('roles.role-list');
        $this->dispatch('closeCrudRole');
    }

    public function delete()
    {
        $this->role->delete();

        $this->dispatch('refreshList')->to('roles.role-list');
        $this->dispatch('closeCrudRole');
    }

    public function render()
    {
        $permissions = DB::table('permissions')->get()->groupBy('group');
        // dd($permissions);

        return view('admins.roles.livewire.role-crud', ['permissions' => $permissions]);
    }
}
