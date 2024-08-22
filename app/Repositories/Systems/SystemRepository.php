<?php

namespace App\Repositories\Systems;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SystemRepository extends BaseRepository implements SystemRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\System::class;
    }

    public function getSystem()
    {
        return $this->model->orderBy('created_at', 'DESC')->take(7)->get();
    }

    public function createSystem($name, $pic, $links)
    {
        $extension = $pic->getClientOriginalName();
        $filename = time() . '_' . $extension;

        $path =  $pic->storeAs('systems', $filename, 'public');

        $system = $this->model->create([
            'name' => trim($name),
            'pic' => trim($path),
            'links' => trim($links),
        ]);
        return $system;
    }

    public function updateSystem($systemModel, $name, $pic, $links)
    {
        if ($pic != $systemModel->pic) {
            try {
                Storage::disk('public')->delete($systemModel->pic);
            } catch (\Throwable $th) {
            }
            $extension = $pic->getClientOriginalName();
            $filename = time() . '_' . $extension;

            $path =  $pic->storeAs('systems', $filename, 'public');
        } else {
            $path = $systemModel->pic;
        }

        $system = $systemModel->update([
            'name' => trim($name),
            'pic' => trim($path),
            'links' => trim($links),
        ]);

        return $system;
    }

    public function deleteSystem($systemModel)
    {
        Storage::disk('public')->delete($systemModel->pic);

        return $systemModel->delete();
    }

}
