<?php

namespace App\Repositories\Sliders;

use App\Repositories\RepositoryInterface;

interface SliderRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getSlider();
    public function createSlider($stt, $pic);
    public function updateSlider($sliderModel, $stt, $pic);
    public function deleteSlider($sliderModel);
}
