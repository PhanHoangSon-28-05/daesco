<?php

namespace App\Livewire\Developments;

use App\Models\Development;
use App\Repositories\Developments\DevelopmentRepositoryInterface;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class DevelopmentCrud extends Component
{
    use WithFileUploads;
    public $action,
        $development,
        $pic;

    #[Validate('required', message: 'Chưa nhập số thứ tự')]
    public $date;
    #[Validate('required', message: 'Chưa nhập số thứ tự')]
    public $description;

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
        $this->development = Development::find(abs($id));
        // dd($this->development);
        $this->getData();
    }


    public function getData()
    {
        // dd($this->development);
        if ($this->development) {
            $this->date = $this->development->date;
            $this->description = $this->development->description;
            $this->pic = $this->development->pic;
        } else {
            $this->date = '';
            $this->description = '';
            $this->pic = '';
        }

        $this->resetErrorBag();
    }

    public function create(DevelopmentRepositoryInterface $developmentRepo)
    {
        $this->validate();
        $development = $developmentRepo->createdevelopment($this->date, $this->description, $this->pic);

        $this->dispatch('refreshList')->to('developments.development-list');
        $this->dispatch('closeCrudDevelopment');
    }

    public function update(DevelopmentRepositoryInterface $developmentRepo)
    {
        $this->validate();

        $developmentRepo->updatedevelopment($this->development, $this->date, $this->description, $this->pic);

        $this->dispatch('refreshList')->to('developments.development-list');
        $this->dispatch('closeCrudDevelopment');
    }

    public function delete(DevelopmentRepositoryInterface $developmentRepo)
    {
        $developmentRepo->deletedevelopment($this->development);

        $this->dispatch('refreshList')->to('developments.development-list');
        $this->dispatch('closeCrudDevelopment');
    }
    public function render()
    {
        return view('admins.developments.livewire.development-crud');
    }
}
