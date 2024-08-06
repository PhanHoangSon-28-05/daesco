<?php

namespace App\Livewire\Product;

use App\Models\Product;
use App\Repositories\Product\ProductRepositoryInterface;
use Livewire\Component;

class ProductList extends Component
{
    protected $listeners = [
        'refreshList' => '$refresh',
    ];

    public function render(ProductRepositoryInterface $productRepo)
    {
        $products = $productRepo->getAll();

        return view('admins.products.livewire.product-list', ['products' => $products]);
    }
}
