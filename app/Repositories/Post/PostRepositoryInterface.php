<?php

namespace App\Repositories\Post;

use App\Repositories\RepositoryInterface;

interface PostRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getPost();
    public function createPost(
        $category_id,
        $name_vi,
        $description_vi,
        $name_en,
        $description_en,
        $detail_vi,
        $detail_en,
        $pic,
        $year_id
    );
    public function updatePost(
        $postModel,
        $category_id,
        $name_vi,
        $description_vi,
        $name_en,
        $description_en,
        $detail_vi,
        $detail_en,
        $pic,
        $year_id
    );
    public function deletePost($postModel);

    // View
    public function getDESC($type);
    public function getSlug($slug);
}
