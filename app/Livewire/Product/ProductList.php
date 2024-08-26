<?php

namespace App\Livewire\Product;

use App\Models\Year;
use App\Models\Product;
use Livewire\Component;
use App\Repositories\Product\ProductRepositoryInterface;

class ProductList extends Component
{
    public $name;
    public $years;
    public $selected_year;

    protected $listeners = [
        'refreshList' => '$refresh',
    ];

    public function mount()
    {
        $this->years = Year::orderBy('name', 'desc')->get();
    }

    public function render(ProductRepositoryInterface $productRepo)
    {
        $params = [
            'title' => $this->name,
            'year' => $this->selected_year
        ];
        // $products = $productRepo->getAll();
        $products = $productRepo->getListProductsByParams($params);

        return view('admins.products.livewire.product-list', ['products' => $products]);
    }
}
