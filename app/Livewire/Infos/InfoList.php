<?php

namespace App\Livewire\Infos;

use App\Models\Info;
use Livewire\Component;

class InfoList extends Component
{
    protected $listeners = [
        'refreshList' => '$refresh'
    ];
    public function render()
    {
        $infos = Info::all();
        return view('admins.infos.livewire.info-list', ['infos' => $infos]);
    }
}
