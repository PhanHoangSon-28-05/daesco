<?php

namespace App\Repositories\Services;

use App\Repositories\BaseRepository;
use App\Repositories\Services\ServiceRepositoryInterface;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceRepository extends BaseRepository implements ServiceRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Service::class;
    }

    public function getService()
    {
        return $this->model->select('service_name')->take(5)->get();
    }

    public function createService(
        $name_vi,
        $name_en,
        $detail_vi,
        $detail_en,
        $pic,
        $slug_sections,
        $service_type_id,
    ) {
        if ($pic) {
            $extension = $pic->getClientOriginalName();
            $filename = time() . '_' . $extension;

            $path =  $pic->storeAs('services', $filename, 'public');
        } else {
            $path = '';
        }

        $ServiceData = [
            'name_vi' => trim($name_vi),
            'name_en' => trim($name_en),
            'detail_vi' => trim($detail_vi),
            'detail_en' => trim($detail_en),
            'pic' => $path,
            'slug_sections' => $slug_sections,
            'service_type_id' => $service_type_id,
        ];

        if ($name_en) {
            $ServiceData['slug'] = Str::slug($name_en);
        } else {
            $ServiceData['slug'] = Str::slug($name_vi);
        }

        $Service = $this->model->create($ServiceData);

        return $Service;
    }

    public function updateService(
        $serviceModel,
        $name_vi,
        $name_en,
        $detail_vi,
        $detail_en,
        $pic,
        $slug_sections,
        $service_type_id,
    ) {
        if ($pic != $serviceModel->pic) {
            Storage::disk('public')->delete($serviceModel->pic);
            $extension = $pic->getClientOriginalName();
            $filename = time() . '_' . $extension;

            $path =  $pic->storeAs('services', $filename, 'public');
        } else {
            $path = $serviceModel->pic;
        }

        $serviceData = [
            'name_vi' => trim($name_vi),
            'name_en' => trim($name_en),
            'detail_vi' => trim($detail_vi),
            'detail_en' => trim($detail_en),
            'pic' => $path,
            'slug_sections' => $slug_sections,
            'service_type_id' => $service_type_id,
        ];
        if ($name_en) {
            $serviceData['slug'] = Str::slug($name_en);
        } else {
            $serviceData['slug'] = Str::slug($name_vi);
        }
        $service = $serviceModel->update($serviceData);

        return $service;
    }

    public function deleteService($serviceModel)
    {
        Storage::disk('public')->delete($serviceModel->pic);

        return $serviceModel->delete();
    }

    public function getSlugSv($slug)
    {
        return $this->model->where('slug_sections', $slug)->get();
    }

    public function  getSlug($slug)
    {
        $service = $this->model->where('slug', $slug)->get()->first();

        return $service;
    }

    public function getByServiceTypeId($id)
    {
        return $this->model->where('service_type_id', $id)->get();
    }
}
