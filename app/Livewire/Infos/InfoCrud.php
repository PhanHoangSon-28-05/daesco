<?php

namespace App\Livewire\Infos;

use App\Models\Info;
use App\Repositories\Infos\InfoRepositoryInterface;
use Livewire\Attributes\Validate;
use Livewire\Component;

class InfoCrud extends Component
{
    public $action,
        $info;

    public string $name_en;

    #[Validate('required|string|max:255', message: 'Chưa nhập tên')]
    public string $name_vi;
    #[Validate('required|string|max:255', message: 'Chưa nhập số điện thoại')]
    public string $phone;

    public function modalSetup($id)
    {
        // dd($this->type);
        if ($id == 0) {
            $this->action = 'create';
        } elseif ($id > 0) {
            $this->action = 'update';
        } else {
            $this->action = 'delete';
        }
        // dd($id);
        $this->info = Info::find(abs($id));
        $this->getData();
    }


    public function getData()
    {
        if ($this->info) {
            $this->name_vi = $this->info->name_vi;
            $this->name_en = $this->info->name_en;
            $this->phone = $this->info->phone;
        } else {
            $this->name_vi = '';
            $this->name_en = '';
            $this->phone = '';
        }
    }

    public function create(InfoRepositoryInterface $infoRepo)
    {
        $this->validate();

        $info = $infoRepo->createInfo($this->name_vi, $this->name_en, $this->phone);

        $this->dispatch('refreshList')->to('infos.info-list');
        $this->dispatch('closeCrudInfo');
    }

    public function update(InfoRepositoryInterface $infoRepo)
    {
        $this->validate();

        $info = $infoRepo->updateInfo($this->info, $this->name_vi, $this->name_en, $this->phone);

        $this->dispatch('refreshList')->to('infos.info-list');
        $this->dispatch('closeCrudInfo');
    }

    public function delete()
    {
        $this->info->delete();

        $this->dispatch('refreshList')->to('infos.info-list');
        $this->dispatch('closeCrudInfo');
    }
    public function render()
    {
        return view('admins.infos.livewire.info-crud');
    }
}
