<?php

namespace App\Livewire\Organizationals;

use App\Models\Organizational;
use Livewire\Component;

class OrganizationalList extends Component
{
    protected $listeners = [
        'refreshList' => '$refresh'
    ];
    public function render()
    {
        $organizationals = Organizational::all();
        return view('admins.organizational.livewire.organizational-list', ['organizationals' => $organizationals]);
    }
}
