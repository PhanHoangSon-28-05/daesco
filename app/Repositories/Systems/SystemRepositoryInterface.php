<?php

namespace App\Repositories\Systems;

use App\Repositories\RepositoryInterface;

interface SystemRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getSystem();
    public function createSystem($name, $pic, $links);
    public function updateSystem($systemModel, $name, $pic, $links);
    public function deleteSystem($systemModel);

}
