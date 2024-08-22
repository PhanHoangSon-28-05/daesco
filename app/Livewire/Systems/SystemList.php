<?php

namespace App\Livewire\Systems;

use App\Models\System;
use Livewire\Component;

class SystemList extends Component
{

    protected $listeners = [
        'refreshList' => '$refresh'
    ];
    public function render()
    {
        $systems = System::all();
        return view('admins.systems.livewire.system-list', ['systems' => $systems]);
    }
}
