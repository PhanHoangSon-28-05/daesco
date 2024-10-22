<?php

namespace App\Repositories\Sliders;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SliderRepository extends BaseRepository implements SliderRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Slider::class;
    }

    public function getSlider()
    {
        return $this->model->orderBy('created_at', 'DESC')->get();
    }

    public function createSlider($stt, $pic)
    {
        $extension = $pic->getClientOriginalName();
        $filename = time() . '_' . $extension;

        $path =  $pic->storeAs('sliders', $filename, 'public');

        $slider = $this->model->create([
            'stt' => trim($stt),
            'pic' => trim($path),
        ]);
        return $slider;
    }

    public function updateSlider($sliderModel, $stt, $pic)
    {
        if ($pic != $sliderModel->pic) {
            try {
                Storage::disk('public')->delete($sliderModel->pic);
            } catch (\Throwable $th) {
                //throw $th;
            }
            $extension = $pic->getClientOriginalName();
            $filename = time() . '_' . $extension;

            $path =  $pic->storeAs('sliders', $filename, 'public');
        } else {
            $path = $sliderModel->pic;
        }

        $slider = $sliderModel->update([
            'stt' => trim($stt),
            'pic' => trim($path),
        ]);

        return $slider;
    }

    public function deleteSlider($sliderModel)
    {
        Storage::disk('public')->delete($sliderModel->pic);

        return $sliderModel->delete();
    }
}
