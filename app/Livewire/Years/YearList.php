<?php

namespace App\Livewire\Years;

use App\Models\Year;
use Livewire\Component;

class YearList extends Component
{
    public function render()
    {
        $years = Year::get();
        return view('admins.years.livewire.year-list', ['years' => $years]);
    }
}
