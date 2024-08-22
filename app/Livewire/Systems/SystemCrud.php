<?php

namespace App\Livewire\Systems;

use App\Models\System;
use App\Repositories\Systems\SystemRepositoryInterface;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class SystemCrud extends Component
{
    use WithFileUploads;
    public $action,
        $system,
        $pic;
    public $links;

    #[Validate('required', message: 'Chưa nhập tên')]
    public $name;

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
        $this->system = System::find(abs($id));
        // dd($this->system);
        $this->getData();
    }


    public function getData()
    {
        // dd($this->system);
        if ($this->system) {
            $this->name = $this->system->name;
            $this->links = $this->system->links;
            $this->pic = $this->system->pic;
        } else {
            $this->name = '';
            $this->links = '';
            $this->pic = '';
        }

        $this->resetErrorBag();
    }

    public function create(SystemRepositoryInterface $systemRepo)
    {
        $this->validate();
        $system = $systemRepo->createsystem($this->name, $this->pic, $this->links);

        $this->dispatch('refreshList')->to('systems.system-list');
        $this->dispatch('closeCrudSystem');
    }

    public function update(SystemRepositoryInterface $systemRepo)
    {
        $this->validate();

        $systemRepo->updatesystem($this->system, $this->name, $this->pic, $this->links);

        $this->dispatch('refreshList')->to('systems.system-list');
        $this->dispatch('closeCrudSystem');
    }

    public function delete(SystemRepositoryInterface $systemRepo)
    {
        $systemRepo->deletesystem($this->system);

        $this->dispatch('refreshList')->to('systems.system-list');
        $this->dispatch('closeCrudSystem');
    }
    public function render()
    {
        return view('admins.systems.livewire.system-crud');
    }
}
