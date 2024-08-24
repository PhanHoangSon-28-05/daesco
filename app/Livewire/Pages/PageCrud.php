<?php

namespace App\Livewire\Pages;

use App\Models\Page;
use App\Repositories\Categorys\CategoryRepositoryInterface;
use App\Repositories\Page\PageRepositoryInterface;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class PageCrud extends Component
{
    use WithFileUploads;
    public $action,
        $page,
        $name_en,
        $detail_en,
        $description_en,
        $category_id;

    #[Rule('required|string|max:255', message: 'Chưa tiêu đề')]
    public string $name_vi;
    #[Validate('required|string', message: 'Chưa nhập mô tả')]
    public string $description_vi;
    #[Validate('required|string', message: 'Chưa nhập chi tiết')]
    public string $detail_vi;
    // #[Validate('required|file|mimes:png,jpg,pdf', message: 'Chưa nhập ảnh')]
    public $pic;

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
        $this->page = Page::find(abs($id));
        $this->getData();
    }


    public function getData()
    {
        // dd($this->Page);
        if ($this->page) {
            $this->category_id = $this->page->category_id;
            $this->name_vi = $this->page->name_vi;
            $this->detail_vi = $this->page->detail_vi;
            $this->description_vi = $this->page->description_vi;
            $this->name_en = $this->page->name_en;
            $this->detail_en = $this->page->detail_en;
            $this->description_en = $this->page->description_en;
            $this->pic = $this->page->pic;
        } else {
            $this->category_id = '';
            $this->name_vi = '';
            $this->detail_vi = '';
            $this->description_vi = '';
            $this->name_en = '';
            $this->detail_en = '';
            $this->description_en = '';
            $this->pic = '';
        }

        $this->dispatch('setDetailEditorContent');
        $this->resetErrorBag();
    }

    public function create(PageRepositoryInterface $pageRepo)
    {
        // dd($this->detail_vi);
        $this->validate();

        $page = $pageRepo->createPage(
            $this->category_id,
            $this->name_vi,
            $this->description_vi,
            $this->name_en,
            $this->description_en,
            $this->detail_vi,
            $this->detail_en,
            $this->pic
        );
        $this->dispatch('$refresh')->to('pages.page-list');
        $this->dispatch('closeCrudPage');
    }

    public function update(PageRepositoryInterface $pageRepo)
    {
        $this->validate();

        $page = $pageRepo->updatePage(
            $this->page,
            $this->category_id,
            $this->name_vi,
            $this->description_vi,
            $this->name_en,
            $this->description_en,
            $this->detail_vi,
            $this->detail_en,
            $this->pic
        );
        $this->dispatch('refreshList')->to('pages.page-list');
        $this->dispatch('closeCrudPage');
    }

    public function delete(PageRepositoryInterface $pageRepo)
    {
        $pageRepo->deletePage($this->page);
        $this->dispatch('refreshList')->to('pages.page-list');
        $this->dispatch('closeCrudPage');
    }

    public function render(CategoryRepositoryInterface $categoryRepo)
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

        $categories = $categoryRepo->getChildNew(0);
        return view('admins.pages.livewire.page-crud', [
            'categories' => $categories,
            'cover_img' => $cover_img,
        ]);
    }
}
