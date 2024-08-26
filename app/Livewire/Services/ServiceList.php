<?php

namespace App\Livewire\Services;

use App\Models\Year;
use App\Models\Service;
use Livewire\Component;

class ServiceList extends Component
{
    public $name = '';
    public $years;
    public $selected_year;

    protected $listeners = [
        'refreshList' => '$refresh'
    ];
    
    public function mount()
    {
        $this->years = Year::orderBy('name', 'desc')->get();
    }

    public function getListServices()
    {
        $services = Service::query();

        if (isset($this->name) && $this->name != '') {
            $services->whereLike('name_vi', '%'.$this->name.'%');
        }

        if (isset($this->selected_year) && $this->selected_year != '') {
            $services->whereYear('created_at', $this->selected_year);
        }

        return $services->get();
    }

    public function render()
    {
        $services = $this->getListServices();
        return view('admins.services.livewire.service-list', ['services' => $services]);
    }
}
