<?php

namespace App\Livewire\Categorys;

use App\Models\Category;
use App\Repositories\Categorys\CategoryRepositoryInterface;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CategoryCrudProducts extends Component
{
    use WithFileUploads;
    public $action,
        $category,
        $category_id,
        $parent_id,
        $type,
        $slug,
        $image;

    #[Validate('required|string|max:255', message: 'Chưa nhập tên')]
    public string $name_vi;
    public string $name_en;

    protected $listeners = [
        'setDefaultType'
    ];

    public function setDefaultType()
    {
        $this->type = 1;
        $this->parent_id = 0;
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
        $this->category = Category::find(abs($id));
        $this->category_id = $id;
        $this->getData();
    }


    public function getData()
    {
        if ($this->category) {
            $this->name_vi = $this->category->name_vi;
            $this->name_en = $this->category->name_en;
            $this->parent_id = $this->category->parent_id;
            $this->image = $this->category->image;
        } else {
            $this->name_vi = '';
            $this->name_en = '';
            $this->parent_id = 0;
            $this->image = '';
        }
    }

    public function create(CategoryRepositoryInterface $categoryRepo)
    {
        $this->validate();

        $category = $categoryRepo->createCategory($this->parent_id, $this->type, $this->name_vi, $this->name_en, $this->image);

        $this->dispatch('refreshList')->to('categorys.category-list');
        $this->dispatch('closeCrudCategoryProducts');
    }


    public function update(CategoryRepositoryInterface $categoryRepo)
    {
        $this->validate();

        $category = $categoryRepo->updateCategory($this->category_id, $this->parent_id, $this->name_vi, $this->name_en, $this->image);

        $this->dispatch('refreshList')->to('categorys.category-list');
        $this->dispatch('closeCrudCategoryProducts');
    }

    public function delete()
    {
        $this->category->delete();

        $this->dispatch('refreshList')->to('categorys.category-list');
        $this->dispatch('closeCrudCategoryProducts');
    }
    public function render(CategoryRepositoryInterface $categoryRepo)
    {
        $categories = $categoryRepo->getCategoryType(2);
        return view('admins.category.livewire.category-crud-products', [
            'categories' => $categories
        ]);
    }
}
