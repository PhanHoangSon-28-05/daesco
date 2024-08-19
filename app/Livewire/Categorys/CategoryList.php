<?php

namespace App\Livewire\Categorys;

use App\Repositories\Categorys\CategoryRepositoryInterface;
use Livewire\Component;

class CategoryList extends Component
{
    protected $listeners = [
        'refreshList' => '$refresh'
    ];
    public function render(CategoryRepositoryInterface $categoryRepo)
    {
        $categories_news = $categoryRepo->getChildNew(0);
        return view('admins.category.livewire.category-list', [
            'categories_news' => $categories_news,
        ]);
    }
}
