<?php

namespace App\Livewire\Services;

use App\Models\Service;
use App\Repositories\Services\ServiceRepositoryInterface;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class ServiceCrud extends Component
{
    use WithFileUploads;
    public $action,
        $service,
        $name_en,
        $detail_en,
        $category_id;

    #[Rule('required|string|max:255', message: 'Chưa tiêu đề')]
    public string $name_vi;
    #[Validate('required|string', message: 'Chưa nhập chi tiết')]
    public string $detail_vi;
    // #[Validate('required|file|mimes:png,jpg,pdf', message: 'Chưa nhập ảnh')]
    public $pic;
    public $slug_sections;

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
        $this->service = Service::find(abs($id));
        $this->getData();
    }


    public function getData()
    {
        // dd($this->service);
        if ($this->service) {
            $this->name_vi = $this->service->name_vi;
            $this->detail_vi = $this->service->detail_vi;
            $this->name_en = $this->service->name_en;
            $this->detail_en = $this->service->detail_en;
            $this->pic = $this->service->pic;
            $this->slug_sections = $this->service->slug_sections;
        } else {
            $this->name_vi = '';
            $this->detail_vi = "";
            $this->name_en = '';
            $this->detail_en = "";
            $this->pic = '';
            $this->slug_sections = '';
        }

        $this->resetErrorBag();
    }

    public function create(ServiceRepositoryInterface $serviceRepo)
    {
        $this->validate();

        $service = $serviceRepo->createService(
            $this->name_vi,
            $this->name_en,
            $this->detail_vi,
            $this->detail_en,
            $this->pic,
            $this->slug_sections,
        );
        $this->dispatch('refreshList')->to('services.service-list');
        $this->dispatch('closeCrudService');
    }

    public function update(ServiceRepositoryInterface $serviceRepo)
    {
        $this->validate();

        $service = $serviceRepo->updateService(
            $this->service,
            $this->name_vi,
            $this->name_en,
            $this->detail_vi,
            $this->detail_en,
            $this->pic,
            $this->slug_sections,
        );
        $this->dispatch('refreshList')->to('services.service-list');
        $this->dispatch('closeCrudService');
    }

    public function delete(ServiceRepositoryInterface $serviceRepo)
    {
        $serviceRepo->deleteservice($this->service);
        $this->dispatch('refreshList')->to('services.service-list');
        $this->dispatch('closeCrudService');
    }

    public function render()
    {
        return view('admins.services.livewire.service-crud');
    }
}
