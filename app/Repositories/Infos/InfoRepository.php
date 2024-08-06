<?php

namespace App\Repositories\Infos;

use App\Repositories\BaseRepository;
use Illuminate\Support\Str;

class InfoRepository extends BaseRepository implements InfoRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Info::class;
    }

    public function getInfo()
    {
        return $this->model->get();
    }

    public function createInfo(
        $name_vi,
        $name_en,
        $phone,
    ) {
        $cateData = [
            'name_vi' => trim($name_vi),
            'name_en' =>  trim($name_en),
            'phone' =>  trim($phone),
        ];

        $info = $this->model->create($cateData);
        return $info;
    }

    public function updateInfo(
        $modelInfo,
        $name_vi,
        $name_en,
        $phone,
    ) {
        $cateData = [
            'name_vi' => trim($name_vi),
            'name_en' =>  trim($name_en),
            'phone' => $phone,
        ];

        $info = $modelInfo->update($cateData);
        return $info;
    }
}
