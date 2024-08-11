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
        $categories_news = $categoryRepo->getCategoryType(1);
        $categories_products = $categoryRepo->getCategoryType(2);
        return view('admins.category.livewire.category-list', [
            'categories_news' => $categories_news,
            'categories_products' => $categories_products,
        ]);
    }
}
