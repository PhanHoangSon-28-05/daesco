<?php

namespace App\Repositories\Categorys;

use App\Repositories\RepositoryInterface;

interface CategoryRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getCategory();
    public function getChildNew($parentId);
    public function createCategory($parent_id, $name_vi, $name_en, $image, $stt);
    public function updateCategory($id, $parent_id, $name_vi, $name_en, $image, $stt);


    // Views
    public function getCate();
    public function getCateNews($id);
    public function getIntroduce();
    public function getFieldOperation();
    public function getCateSlug($slug);
    public function getCateSlugtoPost($slug);
    public function getCateSlugNoChill();
}
