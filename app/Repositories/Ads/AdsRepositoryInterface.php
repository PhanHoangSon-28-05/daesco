<?php

namespace App\Repositories\Ads;

use App\Repositories\RepositoryInterface;

interface AdsRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getAds();
    public function createAds($url, $pic);
    public function updateAds($adsModel, $url, $pic);
}
