<?php

namespace App\Repositories\Footers;

use App\Repositories\RepositoryInterface;

interface FooterRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getFooter();
    public function updateFooter($address, $email, $facebook);
}
