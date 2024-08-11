<?php

namespace App\Livewire\Sliders;

use App\Models\Slider;
use Livewire\Component;

class SliderList extends Component
{

    protected $listeners = [
        'refreshList' => '$refresh'
    ];
    public function render()
    {
        $sliders = Slider::orderBy('stt', 'ASC')->get();
        return view('admins.sliders.livewire.slider-list', ['sliders' => $sliders]);
    }
}
