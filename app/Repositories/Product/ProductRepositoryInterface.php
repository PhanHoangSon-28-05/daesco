<?php

namespace App\Repositories\Product;

use App\Repositories\RepositoryInterface;

interface ProductRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getProduct();
    public function createProduct($category_id, $title_vi, $payload_vi, $description_vi, $title_en, $payload_en, $description_en, $general_specifications_vi, $features_vi, $general_specifications_en, $features_en, $price, $links);
    public function updateProduct($productModel, $category_id, $title_vi, $payload_vi, $description_vi, $title_en, $payload_en, $description_en, $general_specifications_vi, $features_vi, $general_specifications_en, $features_en, $price, $links);
    public function UploadImageProduct($id, $images);
    public function selectProduct($idPro, $image);
    public function deleteProduct($modelProduct);
}
