<?php

namespace App\Livewire\Developments;

use App\Models\Development;
use Livewire\Component;

class DevelopmentList extends Component
{

    protected $listeners = [
        'refreshList' => '$refresh'
    ];
    public function render()
    {
        $developments = Development::orderBy('date', 'ASC')->get();
        return view('admins.developments.livewire.development-list', ['developments' => $developments]);
    }
}
