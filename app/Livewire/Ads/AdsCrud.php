<?php

namespace App\Livewire\Ads;

use App\Models\Ads;
use App\Repositories\Ads\AdsRepositoryInterface;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdsCrud extends Component
{
    use WithFileUploads;
    public $action,
        $ads,
        $url;

    #[Validate('file|mimes:png,jpg,pdf', message: 'Chưa nhập tên')]
    public $pic;

    public function modalSetup($id)
    {
        if ($id == 0) {
            $this->action = 'create';
        } elseif ($id > 0) {
            $this->action = 'update';
        } else {
            $this->action = 'delete';
        }
        // dd($id);
        $this->ads = Ads::find(abs($id));
        $this->getData();
    }


    public function getData()
    {
        // dd($this->ads);
        if ($this->ads) {
            $this->url = $this->ads->url;
            $this->pic =  $this->ads->pic;
        } else {
            $this->url = '';
            $this->pic = '';
        }

        $this->resetErrorBag();
    }

    public function create(AdsRepositoryInterface $adsRepo)
    {
        $this->validate();
        $ads = $adsRepo->createAds($this->url, $this->pic);

        $this->dispatch('refreshList')->to('ads.ads-list');
        $this->dispatch('closeCrudAds');
    }

    public function update(AdsRepositoryInterface $adsRepo)
    {
        $this->validate();

        $adsRepo->updateAds($this->ads, $this->url, $this->pic);

        $this->dispatch('refreshList')->to('ads.ads-list');
        $this->dispatch('closeCrudAds');
    }

    public function delete()
    {
        $this->ads->delete();

        $this->dispatch('refreshList')->to('ads.ads-list');
        $this->dispatch('closeCrudAds');
    }
    public function render()
    {
        return view('admins.ads.livewire.ads-crud');
    }
}
