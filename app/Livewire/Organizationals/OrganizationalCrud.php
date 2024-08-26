<?php

namespace App\Livewire\Organizationals;

use App\Models\MenuOrganizational;
use App\Models\Organizational;
use App\Repositories\Organizational\OrganizationalRepositoryInterface;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class OrganizationalCrud extends Component
{
    use WithFileUploads;
    public $action,
        $parent_id,
        $organizational,
        $name_en,
        $position_en,
        $pic;

    #[Validate('required', message: 'Chưa nhập tên')]
    public $name_vi;
    #[Validate('required', message: 'Chưa nhập chức vụ')]
    public $position_vi;

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
        $this->organizational = Organizational::find(abs($id));
        $this->getData();
    }


    public function getData()
    {
        if ($this->organizational) {
            $this->parent_id = $this->organizational->parent_id;
            $this->name_vi = $this->organizational->name_vi;
            $this->name_en = $this->organizational->name_en;
            $this->position_vi = $this->organizational->position_vi;
            $this->position_en = $this->organizational->position_en;
            $this->pic = $this->organizational->pic;
        } else {
            $this->parent_id = '';
            $this->name_vi = '';
            $this->name_en = '';
            $this->position_vi = '';
            $this->position_en = '';
            $this->pic = '';
        }

        $this->resetErrorBag();
    }

    public function create(OrganizationalRepositoryInterface $organizationalRepo)
    {
        $this->validate();
        $organizational = $organizationalRepo->createOrganizational(
            $this->parent_id,
            $this->name_vi,
            $this->name_en,
            $this->position_vi,
            $this->position_en,
            $this->pic
        );

        $this->dispatch('refreshList')->to('organizationals.organizational-list');
        $this->dispatch('closeCrudOrganizational');
    }

    public function update(OrganizationalRepositoryInterface $organizationalRepo)
    {
        $this->validate();

        $organizationalRepo->updateOrganizational(
            $this->organizational,
            $this->parent_id,
            $this->name_vi,
            $this->name_en,
            $this->position_vi,
            $this->position_en,
            $this->pic
        );

        $this->dispatch('refreshList')->to('organizationals.organizational-list');
        $this->dispatch('closeCrudOrganizational');
    }

    public function delete(OrganizationalRepositoryInterface $organizationalRepo)
    {
        $organizationalRepo->deleteOrganizational($this->organizational);

        $this->dispatch('refreshList')->to('organizationals.organizational-list');
        $this->dispatch('closeCrudOrganizational');
    }

    public function render()
    {
        if ($this->pic) {
            if (gettype($this->pic) == 'string') {
                $cover_img = 'storage/' . $this->pic;
            } else {
                $cover_img = $this->pic->temporaryUrl();
            }
        } else {
            $cover_img = 'images/placeholder/placeholder.png';
        }

        $menu = MenuOrganizational::all();
        return view('admins.organizational.livewire.organizational-crud', [
            'cover_img' => $cover_img,
            'menu' => $menu,
        ]);
    }
}
