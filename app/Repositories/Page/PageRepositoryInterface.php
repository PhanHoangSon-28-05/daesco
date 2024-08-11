<?php

namespace App\Repositories\Page;

use App\Repositories\RepositoryInterface;

interface PageRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getPage();
    public function createPage(
        $category_id,
        $name_vi,
        $description_vi,
        $name_en,
        $description_en,
        $detail_vi,
        $detail_en,
        $pic
    );
    public function updatePage(
        $pageModel,
        $category_id,
        $name_vi,
        $description_vi,
        $name_en,
        $description_en,
        $detail_vi,
        $detail_en,
        $pic
    );
    public function deletePage($pageModel);
}
