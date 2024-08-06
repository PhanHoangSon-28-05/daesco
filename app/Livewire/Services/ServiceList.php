<?php

namespace App\Livewire\Services;

use App\Models\Service;
use Livewire\Component;

class ServiceList extends Component
{
    protected $listeners = [
        'refreshList' => '$refresh'
    ];
    public function render()
    {
        $services = Service::all();
        return view('admins.services.livewire.service-list', ['services' => $services]);
    }
}
