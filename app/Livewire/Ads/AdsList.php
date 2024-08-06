<?php

namespace App\Livewire\Ads;

use App\Models\Ads;
use Livewire\Component;

class AdsList extends Component
{
    protected $listeners = [
        'refreshList' => '$refresh'
    ];
    public function render()
    {
        $ads = Ads::get();
        return view('admins.ads.livewire.ads-list', [
            'ads' => $ads
        ]);
    }
}
