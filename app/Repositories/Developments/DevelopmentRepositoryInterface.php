<?php

namespace App\Repositories\Developments;

use App\Repositories\RepositoryInterface;

interface DevelopmentRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getDevelopment();
    public function createDevelopment($date, $description, $pic);
    public function updateDevelopment($developmentModel, $date, $description, $pic);
    public function deleteDevelopment($developmentModel);

    public function getAsc();
}
