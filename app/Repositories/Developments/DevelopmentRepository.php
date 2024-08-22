<?php

namespace App\Repositories\Developments;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DevelopmentRepository extends BaseRepository implements DevelopmentRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Development::class;
    }

    public function getDevelopment()
    {
        return $this->model->orderBy('created_at', 'DESC')->take(7)->get();
    }

    public function createDevelopment($date, $description, $pic)
    {
        $extension = $pic->getClientOriginalName();
        $filename = time() . '_' . $extension;

        $path =  $pic->storeAs('developments', $filename, 'public');

        $development = $this->model->create([
            'date' => trim($date),
            'description' => trim($description),
            'pic' => trim($path),
        ]);
        return $development;
    }

    public function updateDevelopment($developmentModel, $date, $description, $pic)
    {
        if ($pic != $developmentModel->pic) {
            try {
                Storage::disk('public')->delete($developmentModel->pic);
            } catch (\Throwable $th) {
            }
            $extension = $pic->getClientOriginalName();
            $filename = time() . '_' . $extension;

            $path =  $pic->storeAs('developments', $filename, 'public');
        } else {
            $path = $developmentModel->pic;
        }

        $development = $developmentModel->update([
            'date' => trim($date),
            'description' => trim($description),
            'pic' => trim($path),
        ]);

        return $development;
    }

    public function deleteDevelopment($developmentModel)
    {
        Storage::disk('public')->delete($developmentModel->pic);

        return $developmentModel->delete();
    }

    public function getAsc()
    {
        return $this->model->orderBy('date', 'ASC')->get();
    }
}
