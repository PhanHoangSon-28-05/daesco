<?php

namespace App\Repositories\Organizational;

use App\Models\MenuOrganizational;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class OrganizationalRepository extends BaseRepository implements OrganizationalRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Organizational::class;
    }

    public function getOrganizational()
    {
        return $this->model->orderBy('created_at', 'DESC')->take(7)->get();
    }

    public function createOrganizational(
        $parent_id,
        $name_vi,
        $name_en,
        $position_vi,
        $position_en,
        $pic
    ) {
        try {
            $extension = $pic->getClientOriginalName();
            $filename = time() . '_' . $extension;

            $path =  $pic->storeAs('organizationals', $filename, 'public');
        } catch (\Throwable $th) {
            $path = '';
        }

        $organizational = $this->model->create([
            'parent_id' => $parent_id,
            'name_vi' => trim($name_vi),
            'name_en' => trim($name_en),
            'position_vi' => trim($position_vi),
            'position_en' => trim($position_en),
            'pic' => trim($path),
        ]);
        return $organizational;
    }

    public function updateOrganizational(
        $organizationalModel,
        $parent_id,
        $name_vi,
        $name_en,
        $position_vi,
        $position_en,
        $pic
    ) {
        if ($pic != $organizationalModel->pic) {
            try {
                Storage::disk('public')->delete($organizationalModel->pic);
            } catch (\Throwable $th) {
                //throw $th;
            }
            $extension = $pic->getClientOriginalName();
            $filename = time() . '_' . $extension;

            $path =  $pic->storeAs('organizationals', $filename, 'public');
        } else {
            $path = $organizationalModel->pic;
        }

        $organizational = $organizationalModel->update([
            'parent_id' => $parent_id,
            'name_vi' => trim($name_vi),
            'name_en' => trim($name_en),
            'position_vi' => trim($position_vi),
            'position_en' => trim($position_en),
            'pic' => trim($path),
        ]);

        return $organizational;
    }

    public function deleteOrganizational($organizationalModel)
    {
        try {
            Storage::disk('public')->delete($organizationalModel->pic);
        } catch (\Throwable $th) {
        }
        return $organizationalModel->delete();
    }

    public function createMenu($name_vi, $name_en)
    {
        $menu = MenuOrganizational::create(
            [
                'name_vi' => $name_vi,
                'name_en' => $name_en,
            ]
        );

        return $menu;
    }
    public function updateMenu($model, $name_vi, $name_en)
    {
        $menu = $model->update(
            [
                'name_vi' => $name_vi,
                'name_en' => $name_en,
            ]
        );

        return $menu;
    }

    public function parentID($id)
    {
        $organizational = $this->model->where('parent_id', $id)->get();
        return $organizational;
    }
}
