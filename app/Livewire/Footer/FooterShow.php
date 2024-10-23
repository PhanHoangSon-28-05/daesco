<?php

namespace App\Livewire\Footer;

use App\Models\Footer;
use App\Repositories\Footers\FooterRepositoryInterface;
use Livewire\Component;

class FooterShow extends Component
{
    public $company_name, $address, $hotline, $email;
    public function mount()
    {
        $this->getData();
    }

    public function getData()
    {
        $footer = Footer::all()->first();
        if ($footer) {
            $this->company_name = $footer->company_name;
            $this->address = $footer->address;
            $this->hotline = $footer->hotline;
            $this->email = $footer->email;
        } else {
            $this->company_name = '';
            $this->address = '';
            $this->hotline = '';
            $this->email = '';
        }
    }

    public function update(FooterRepositoryInterface $footerRepo)
    {
        $footerRepo->updateFooter($this->company_name, $this->address, $this->hotline, $this->email);

        $this->dispatch('$refresh')->to('footer.footer-show');
    }
    public function render()
    {
        return view('admins.footer.livewire.footer-show');
    }
}
