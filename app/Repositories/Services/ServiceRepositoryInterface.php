<?php

namespace App\Repositories\Services;

use App\Repositories\RepositoryInterface;

interface ServiceRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getService();
    public function createService(
        $name_vi,
        $name_en,
        $detail_vi,
        $detail_en,
        $pic,
        $slug_sections,
        $service_type_id,
    );
    public function updateService(
        $serviceModel,
        $name_vi,
        $name_en,
        $detail_vi,
        $detail_en,
        $pic,
        $slug_sections,
        $service_type_id,
    );
    public function deleteService($serviceModel);

    public function getSlugSv($slug);

    public function getByServiceTypeId($id);
}
