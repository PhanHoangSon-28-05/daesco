<?php

namespace App\Repositories\Page;

use App\Repositories\BaseRepository;
use App\Repositories\Page\PageRepositoryInterface;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PageRepository extends BaseRepository implements PageRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Page::class;
    }

    public function getPage()
    {
        return $this->model->select('page_name')->take(5)->get();
    }

    public function createPage(
        $category_id,
        $name_vi,
        $description_vi,
        $name_en,
        $description_en,
        $detail_vi,
        $detail_en,
        $pic
    ) {
        if ($pic) {
            $extension = $pic->getClientOriginalName();
            $filename = time() . '_' . $extension;

            $path =  $pic->storeAs('pages', $filename, 'public');
        } else {
            $path = '';
        }


        $pageData = [
            'category_id' => $category_id,
            'name_vi' => trim($name_vi),
            'description_vi' => trim($description_vi),
            'name_en' => trim($name_en),
            'description_en' => trim($description_en),
            'detail_vi' => trim($detail_vi),
            'detail_en' => trim($detail_en),
            'pic' => $path,
        ];

        if ($name_en) {
            $pageData['slug'] = Str::slug($name_en);
        } else {
            $pageData['slug'] = Str::slug($name_vi);
        }

        $page = $this->model->create($pageData);

        return $page;
    }

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
    ) {
        if ($pic != $pageModel->pic) {
            Storage::disk('public')->delete($pageModel->pic);
            $extension = $pic->getClientOriginalName();
            $filename = time() . '_' . $extension;

            $path =  $pic->storeAs('pages', $filename, 'public');
        } else {
            $path = $pageModel->pic;
        }

        $pageData = [
            'category_id' => $category_id,
            'name_vi' => trim($name_vi),
            'description_vi' => trim($description_vi),
            'name_en' => trim($name_en),
            'description_en' => trim($description_en),
            'detail_vi' => trim($detail_vi),
            'detail_en' => trim($detail_en),
            'pic' => $path,
        ];
        if ($name_en) {
            $pageData['slug'] = Str::slug($name_en);
        } else {
            $pageData['slug'] = Str::slug($name_vi);
        }
        $page = $pageModel->update($pageData);

        return $page;
    }

    public function deletePage($pageModel)
    {
        Storage::disk('public')->delete($pageModel->pic);

        return $pageModel->delete();
    }
}
