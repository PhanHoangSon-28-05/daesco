<?php

namespace App\Repositories\Infos;

use App\Repositories\RepositoryInterface;

interface InfoRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getInfo();
    public function createInfo($name_vi, $name_en, $phone);
    public function updateInfo($modelInfo, $name_vi, $name_en, $phone);
}
