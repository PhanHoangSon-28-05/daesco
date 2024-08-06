<?php

namespace App\Repositories\Categorys;

use App\Repositories\RepositoryInterface;

interface CategoryRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getCategory();
    public function getCategoryType($type);
    public function getChildNew($parentId);
    public function getChildPro($parentId);
    public function createCategory($parent_id, $type, $name_vi, $name_en, $image);
    public function updateCategory($id, $parent_id, $name_vi, $name_en, $image);


    // Views
    public function getIntroduce();
    public function getCate();
    public function getCateNews($id);
    public function getCateSlug($slug);
    public function getCateSlugtoPost($slug);
    public function getCateSlugNoChill();
    public function getCateType($type);
}
