<?php

namespace App\Livewire\ServiceTypes;

use Livewire\Component;
use App\Models\ServiceType;

class ServiceTypeList extends Component
{
    protected $listeners = [
        'refreshList' => '$refresh'
    ];
    public function render()
    {
        $service_types = ServiceType::where('parent_id', 0)->get();
        return view('admins.service-types.livewire.service-type-list', [
            'service_types' => $service_types,
        ]);
    }
}
