<?php

namespace App\Repositories\Headers;

use App\Repositories\RepositoryInterface;

interface HeaderRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getHeader();
    public function updateHeader($hotline, $email, $facebook, $instagram, $youtube, $linkedin);
}
