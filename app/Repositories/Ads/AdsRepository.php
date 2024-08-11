<?php

namespace App\Repositories\Ads;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdsRepository extends BaseRepository implements AdsRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Ads::class;
    }

    public function getAds()
    {
        return $this->model->get();
    }

    public function createAds($url, $pic)
    {
        $extension = $pic->getClientOriginalName();
        $filename = time() . '_' . $extension;

        $path =  $pic->storeAs('ads', $filename, 'public');

        $ads = $this->model->create([
            'url' => trim($url),
            'pic' => trim($path),
        ]);
        return $ads;
    }

    public function updateAds($adsModel, $url, $pic)
    {
        if ($pic != $adsModel->pic) {
            Storage::disk('public')->delete($adsModel->pic);
            $extension = $pic->getClientOriginalName();
            $filename = time() . '_' . $extension;

            $path =  $pic->storeAs('pages', $filename, 'public');
        } else {
            $path = $adsModel->pic;
        }
        $ads = $adsModel->update([
            'url' => trim($url),
            'pic' => trim($path),
        ]);

        return $ads;
    }
}
