<?php

namespace App\Repositories\Product;

use App\Models\ImageProduct;
use App\Repositories\BaseRepository;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Product::class;
    }

    public function getProduct()
    {
        return $this->model->select('product_name')->take(5)->get();
    }

    public function createProduct(
        $category_id,
        $title_vi,
        $payload_vi,
        $description_vi,
        $title_en,
        $payload_en,
        $description_en,
        $general_specifications_vi,
        $features_vi,
        $general_specifications_en,
        $features_en,
        $price,
        $links,
    ) {
        $productData = [
            'category_id' => $category_id,
            'title_vi' => $title_vi,
            'payload_vi' => $payload_vi,
            'description_vi' => $description_vi,
            'title_en' => $title_en,
            'payload_en' => $payload_en,
            'description_en' => $description_en,
            'general_specifications_vi' => $general_specifications_vi,
            'features_vi' => $features_vi,
            'general_specifications_en' => $general_specifications_en,
            'features_en' => $features_en,
            'price' => $price,
            'links' => $links,
            'pic' => '',
        ];

        if ($title_en) {
            $productData['slug'] = Str::slug($title_en);
        } else {
            $productData['slug'] = Str::slug($title_vi);
        }

        // dd($productData);

        $product = $this->model->create($productData);

        return $product;
    }

    public function updateProduct(
        $productModel,
        $category_id,
        $title_vi,
        $payload_vi,
        $description_vi,
        $title_en,
        $payload_en,
        $description_en,
        $general_specifications_vi,
        $features_vi,
        $general_specifications_en,
        $features_en,
        $price,
        $links
    ) {
        $productData = [
            'category_id' => $category_id,
            'title_vi' => $title_vi,
            'payload_vi' => $payload_vi,
            'description_vi' => $description_vi,
            'title_en' => $title_en,
            'payload_en' => $payload_en,
            'description_en' => $description_en,
            'general_specifications_vi' => $general_specifications_vi,
            'features_vi' => $features_vi,
            'general_specifications_en' => $general_specifications_en,
            'features_en' => $features_en,
            'price' => $price,
            'links' => $links,
        ];

        if ($title_en) {
            $productData['slug'] = Str::slug($title_en);
        } else {
            $productData['slug'] = Str::slug($title_vi);
        }
        $product = $productModel->update($productData);

        return $product;
    }

    public function UploadImageProduct($id, $images)
    {
        // dd(count($this->images));
        if ($id != null) {
            if (count($images) > 0) {
                foreach ($images as $image) {
                    $extension = $image->getClientOriginalName();
                    $filename = $id . '_' . time() . '_' . $extension;

                    $path =  $image->storeAs('products', $filename, 'public');

                    ImageProduct::create([
                        'product_id' => $id,
                        'image' => $path,
                    ]);
                }
                return true;
            }
        }
        return false;
    }

    public function selectProduct($id, $image)
    {
        $productModel = $this->model->find($id);
        $productModel->update(['pic' => $image]);
        return $productModel;
    }
    public function deleteProduct($modelProduct)
    {
        $images = ImageProduct::where('product_id', $modelProduct->id)->get();
        foreach ($images as $image) {
            // dd($image->image);
            Storage::disk('public')->delete($image->image);
        }

        return $modelProduct->delete();
    }
    
    public function getListProductsByParams($params, $sort = 'asc')
    {
        $products = $this->model->orderBy('created_at', $sort);

        $title = $params['title'] ?? '';
        $year = $params['year'] ?? '';

        if ($title != '') {
            $products->whereLike('title_vi', '%'.$title.'%');
        }

        if ($year != '') {
            $products->whereYear('created_at', $year);
        }

        return $products->get();
    }
}
