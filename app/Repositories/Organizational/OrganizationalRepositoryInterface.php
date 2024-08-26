<?php

namespace App\Repositories\Organizational;

use App\Repositories\RepositoryInterface;

interface OrganizationalRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getOrganizational();
    public function createOrganizational(
        $parent_id,
        $name_vi,
        $name_en,
        $position_vi,
        $position_en,
        $pic
    );
    public function updateOrganizational(
        $organizationalModel,
        $parent_id,
        $name_vi,
        $name_en,
        $position_vi,
        $position_en,
        $pic
    );
    public function deleteOrganizational($organizationalModel);

    public function createMenu($name_vi, $name_en);
    public function updateMenu($menuModel, $name_vi, $name_en);
    public function parentID($id);
}
