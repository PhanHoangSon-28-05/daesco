<?php

namespace App\Livewire\Years;

use App\Models\Year;
use Livewire\Attributes\Validate;
use Livewire\Component;

class YearCrud extends Component
{
    public $action,
        $year;

    #[Validate('required|string|max:255', message: 'Chưa nhập tên')]
    public string $name;

    public function modalSetup($id)
    {
        if ($id == 0) {
            $this->action = 'create';
        } elseif ($id > 0) {
            $this->action = 'update';
        } else {
            $this->action = 'delete';
        }
        // dd($id);
        $this->year = Year::find(abs($id));

        $this->getData();
    }


    public function getData()
    {
        // dd($this->year);
        if ($this->year) {
            $this->name = $this->year->name;
        } else {
            $this->name = '';
        }

        $this->resetErrorBag();
    }

    public function create()
    {
        $this->validate();
        $year = Year::create([
            'name' => $this->name
        ]);

        $this->dispatch('$refresh')->to('years.year-list');
        $this->dispatch('closeCrudYear');
    }

    public function update()
    {
        $this->validate();

        $year = $this->year->update([
            'name' => $this->name
        ]);

        $this->dispatch('$refresh')->to('years.year-list');
        $this->dispatch('closeCrudYear');
    }

    public function delete()
    {
        $this->year->delete();

        $this->dispatch('$refresh')->to('years.year-list');
        $this->dispatch('closeCrudYear');
    }
    public function render()
    {
        return view('admins.years.livewire.year-crud');
    }
}
