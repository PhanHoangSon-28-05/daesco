<?php

namespace App\Livewire\Services;

use App\Models\Service;
use Livewire\Component;

class ServiceList extends Component
{
    public $name = '';

    protected $listeners = [
        'refreshList' => '$refresh'
    ];
    public function render()
    {
        if ($this->name != '') {
            $services = Service::whereLike('name_vi', '%'.$this->name.'%')->get();
        } else {
            $services = Service::all();
        }
        return view('admins.services.livewire.service-list', ['services' => $services]);
    }
}
