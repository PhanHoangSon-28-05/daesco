<?php

namespace App\Livewire\Categorys;

use App\Models\Category;
use App\Repositories\Categorys\CategoryRepositoryInterface;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CategoryCrudNews extends Component
{
    use WithFileUploads;
    public $action,
        $category,
        $category_id,
        $parent_id,
        $type,
        $pic,
        $stt,
        $slug;
    public string $name_en;

    #[Validate('required|string|max:255', message: 'Chưa nhập tên')]
    public string $name_vi;


    protected $listeners = [
        'setDefaultType'
    ];

    public function setDefaultType()
    {
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
            $this->stt = $this->category->stt;
            $this->pic = $this->category->image;
        } else {
            $this->name_vi = '';
            $this->name_en = '';
            $this->parent_id = 0;
            $this->pic = '';
        }
    }

    public function create(CategoryRepositoryInterface $categoryRepo)
    {
        $this->validate();

        $category = $categoryRepo->createCategory($this->parent_id, $this->name_vi, $this->name_en, $this->pic, $this->stt);

        $this->dispatch('refreshList')->to('categorys.category-list');
        $this->dispatch('closeCrudCategoryNews');
    }

    public function update(CategoryRepositoryInterface $categoryRepo)
    {
        $this->validate();

        $category = $categoryRepo->updateCategory($this->category_id, $this->parent_id, $this->name_vi, $this->name_en, $this->pic, $this->stt);

        $this->dispatch('refreshList')->to('categorys.category-list');
        $this->dispatch('closeCrudCategoryNews');
    }

    public function delete()
    {
        $this->category->delete();

        $this->dispatch('refreshList')->to('categorys.category-list');
        $this->dispatch('closeCrudCategoryNews');
    }
    public function render(CategoryRepositoryInterface $categoryRepo)
    {
        $categories = $categoryRepo->getChildNew(0);
        return view('admins.category.livewire.category-crud-news', [
            'categories' => $categories
        ]);
    }
}
