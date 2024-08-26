<?php

namespace App\Livewire\Organizationals;

use App\Models\MenuOrganizational;
use App\Repositories\Organizational\OrganizationalRepositoryInterface;
use Livewire\Attributes\Validate;
use Livewire\Component;

class OrganizationalMenu extends Component
{

    #[Validate('required', message: 'Chưa nhập tên')]
    public $name_vi;
    public $name_en;
    public $menu, $action;

    public function modalSetup($id)
    {
        if ($id == 0) {
            $this->action = 'create';
        } elseif ($id > 0) {
            $this->action = 'update';
        } else {
            $this->action = 'delete';
        }

        $this->menu = MenuOrganizational::find(abs($id));
        if ($this->menu) {
            $this->name_vi = $this->menu->name_vi;
            $this->name_en = $this->menu->name_en;
        } else {
            $this->name_vi = "";
            $this->name_en = "";
        }
    }

    public function create(OrganizationalRepositoryInterface $organizationalRepo)
    {
        $this->validate();
        $organizationalRepo->createMenu($this->name_vi, $this->name_en);

        $this->dispatch('closeMenuModel');
    }

    public function update(OrganizationalRepositoryInterface $organizationalRepo)
    {
        $this->validate();

        if ($this->menu) {
            $organizationalRepo->updateMenu($this->menu, $this->name_vi, $this->name_en);

            $this->resetInputFields();
            $this->menu = null;
        }

        $this->dispatch('closeMenuModel');
    }

    public function delete()
    {
        $this->menu->delete();
        $this->dispatch('closeMenuModel');
    }

    private function resetInputFields()
    {
        $this->name_vi = '';
        $this->name_en = '';
    }

    public function render()
    {
        $menus = MenuOrganizational::all();

        $this->resetErrorBag();
        return view('admins.organizational.livewire.organizational-menu', [
            'menus' => $menus,
        ]);
    }
}
