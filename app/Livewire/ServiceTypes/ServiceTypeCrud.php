<?php

namespace App\Livewire\ServiceTypes;

use Livewire\Component;
use App\Models\ServiceType;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class ServiceTypeCrud extends Component
{
    use WithFileUploads;
    public $action;
    public $service_type;
    public $parent_id;
    public $type;
    public $pic;
    public $lock_type = false;
    public string $title_en;

    #[Validate('required|string|max:255', message: 'Chưa nhập tên')]
    public string $title_vi;

    public function updatedParentId()
    {
        if ($this->parent_id <= 0) {
            $this->lock_type = false;
        } else {
            $this->type = ServiceType::find($this->parent_id)->type;
            $this->lock_type = true;
        }
    }

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
        $this->service_type = ServiceType::find(abs($id));
        $this->getData();
    }

    public function getData()
    {
        $this->title_vi = $this->service_type->title_vi ?? '';
        $this->title_en = $this->service_type->title_en ?? '';
        $this->parent_id = $this->service_type->parent_id ?? 0;
        $this->type = $this->service_type->type ?? 'product';
        $this->pic = $this->service_type->pic ?? '';
        
        if ($this->parent_id > 0) $this->lock_type = true;
        else $this->lock_type = false;
    }

    public function create()
    {
        $this->validate();

        if ($this->pic != '') {
            $extension = $this->pic->getClientOriginalName();
            $filename = time() . '_' . $extension;

            $path =  $this->pic->storeAs('service_type', $filename, 'public');
        }

        ServiceType::create([
            'title_vi' => trim($this->title_vi),
            'title_en' => trim($this->title_en),
            'slug' => Str::slug($this->title_vi),
            'type' => $this->type,
            'parent_id' => $this->parent_id,
            'pic' => $path,
        ]);

        $this->dispatch('refreshList')->to('service-types.service-type-list');
        $this->dispatch('closeCrudServiceType');
    }

    public function update()
    {
        $this->validate();

        if (gettype($this->pic) == 'string') {
            $path = $this->pic;
        } elseif ($this->pic != '') {
            $extension = $this->pic->getClientOriginalName();
            $filename = time() . '_' . $extension;

            $path =  $this->pic->storeAs('service_type', $filename, 'public');
        }

        $this->service_type->update([
            'title_vi' => trim($this->title_vi),
            'title_en' => trim($this->title_en),
            'slug' => Str::slug($this->title_vi),
            'type' => $this->type,
            'parent_id' => $this->parent_id,
            'pic' => $path,
        ]);

        $this->dispatch('refreshList')->to('service-types.service-type-list');
        $this->dispatch('closeCrudServiceType');
    }

    public function delete()
    {
        $this->service_type->delete();

        $this->dispatch('refreshList')->to('service_types.service-type-list');
        $this->dispatch('closeCrudServiceType');
    }

    public function render()
    {
        if ($this->pic) {
            if (gettype($this->pic) == 'string') {
                $cover_img = 'storages/' . $this->pic;
            } else {
                $cover_img = $this->pic->temporaryUrl();
            }
        } else {
            $cover_img = 'images/placeholder/placeholder.png';
        }
        $service_types = ServiceType::where('parent_id', 0)->get();
        return view('admins.service-types.livewire.service-type-crud', [
            'service_types' => $service_types,
            'cover_img' => $cover_img,
        ]);
    }
}
