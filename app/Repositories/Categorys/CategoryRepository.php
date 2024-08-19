<?php

namespace App\Repositories\Categorys;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Category::class;
    }

    public function getCategory()
    {
        return $this->model->get();
    }

    public function getChildNew($parentId)
    {
        return $this->model->where('parent_id', $parentId)->orderBy('stt')->get();
    }

    public function createCategory(
        $parent_id,
        $name_vi,
        $name_en,
        $image,
        $stt
    ) {
        $cateData = [
            'parent_id' => $parent_id,
            'name_vi' => trim($name_vi),
            'name_en' =>  trim($name_en),
            'image' =>  trim($image),
            'stt' =>  trim($stt),
        ];

        if ($name_en) {
            $cateData['slug'] = Str::slug($name_en);
        } else {
            $cateData['slug'] = Str::slug($name_vi);
        }

        if ($image != '') {
            $extension = $image->getClientOriginalName();
            $filename = time() . '_' . $extension;

            $path =  $image->storeAs('category', $filename, 'public');

            $cateData['image'] = $path;
        }

        $category = $this->model->create($cateData);
        return $category;
    }

    public function updateCategory(
        $id,
        $parent_id,
        $name_vi,
        $name_en,
        $image,
        $stt
    ) {
        $category = $this->model->find($id);
        // dd($category);
        $cateData = [
            'parent_id' => $parent_id,
            'name_vi' => trim($name_vi),
            'name_en' =>  trim($name_en),
            'stt' =>  trim($stt),
        ];

        if ($name_en) {
            $cateData['slug'] = Str::slug($name_en);
        } else {
            $cateData['slug'] = Str::slug($name_vi);
        }
        if ($image) {
            if ($image != $category->image) {
                Storage::disk('public')->delete($category->image);
                $extension = $image->getClientOriginalName();
                $filename = time() . '_' . $extension;

                $path =  $image->storeAs('category', $filename, 'public');

                $cateData['image'] = $path;
            } else {
                $path = $category->image;
            }
        }


        $category->update($cateData);
        return $category;
    }

    //Views

    // Headers
    public function getCate()
    {

        $cate = $this->model->where('parent_id', 0)->orderBy('stt')->get();

        return $cate;
    }

    public function getCateNews($id)
    {
        $cate = $this->model->where('parent_id', $id)->get();
        return $cate;
    }
    // End Headers

    // Home
    public function getIntroduce()
    {
        $get = $this->model->where('slug', 'gioi-thieu')->get()->first();
        return $get;
    }
    public function getFieldOperation()
    {
        $get = $this->model->where('slug', 'field-operation')->get()->first();
        $cate = $this->model->where('parent_id', $get->id)->get();

        return $cate;
    }


    // End Home

    public function getCateSlug($slug)
    {
        $cate = $this->model->where('slug', $slug)->first();
        return $cate;
    }

    public function getCateSlugtoPost($slug)
    {
        $posts = $this->getCateSlug($slug)->posts()->orderBy('created_at', 'DESC')->paginate(6);
        return $posts;
    }

    public function getCateSlugNoChill()
    {

        $parentIds = $this->model->select('parent_id')
            ->whereNotNull('parent_id')
            ->pluck('parent_id');

        $categories = $this->model->whereNotIn('id', $parentIds)
            ->whereNotIn('parent_id', function ($query) {
                $query->select('id')->from('categories');
            })
            ->where('parent_id', 0)->get();

        return $categories;
    }
}
