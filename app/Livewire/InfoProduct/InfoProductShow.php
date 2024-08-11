<?php

namespace App\Livewire\InfoProduct;

use App\Models\Info_product;
use App\Repositories\InfoProducts\InfoProductRepositoryInterface;
use Livewire\Component;

class InfoProductShow extends Component
{
    public $address, $hotline, $email;

    public function mount()
    {
        $this->getData();
    }

    public function getData()
    {
        $footer = Info_product::all()->first();
        if ($footer) {
            $this->address = $footer->address;
            $this->hotline = $footer->hotline;
            $this->email = $footer->email;
        } else {
            $this->address = '';
            $this->hotline = '';
            $this->email = '';
        }
    }

    public function update(InfoProductRepositoryInterface $infoRepo)
    {
        $infoRepo->updateInfoProduct($this->address, $this->hotline, $this->email);

        $this->dispatch('$refresh')->to('info-product.info-product-show');
    }

    public function render()
    {

        return view('admins.infor_products.livewire.info-product-show');
    }
}
