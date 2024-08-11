<?php

namespace App\Repositories\InfoProducts;

use App\Repositories\RepositoryInterface;

interface InfoProductRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getInfoProduct();
    public function updateInfoProduct($address, $email, $facebook);
}
