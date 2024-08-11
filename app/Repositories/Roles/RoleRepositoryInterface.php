<?php

namespace App\Repositories\Roles;

use App\Repositories\RepositoryInterface;

interface RoleRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getRole();
    public function createRole($display_name, $description, $permission_ids = []);
    public function updateRole($roleModel, $display_name, $description, $permission_ids = []);
}
