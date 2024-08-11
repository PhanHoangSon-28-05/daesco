<?php

namespace App\Livewire\Roles;

use App\Repositories\Roles\RoleRepositoryInterface;
use Livewire\Component;

class RoleList extends Component
{

    protected $listeners = [
        'refreshList' => '$refresh'
    ];
    public function render(RoleRepositoryInterface $roleRepo)
    {
        $roles = $roleRepo->getRole();
        return view('admins.roles.livewire.role-list', ['roles' => $roles]);
    }
}
