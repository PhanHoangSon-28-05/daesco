<?php

namespace App\Livewire\Header;

use App\Models\Header;
use App\Repositories\Headers\HeaderRepositoryInterface;
use Livewire\Component;

class HeaderShow extends Component
{
    public $hotline, $email, $facebook, $instagram, $youtube, $linkedin;

    public function mount()
    {
        $this->getData();
    }

    public function getData()
    {
        $header = Header::all()->first();
        if ($header) {
            $this->hotline = $header->hotline;
            $this->email = $header->email;
            $this->facebook = $header->facebook;
            $this->instagram = $header->instagram;
            $this->youtube = $header->youtube;
            $this->linkedin = $header->linkedin;
        }else{
            $this->hotline ='';
            $this->email = '';
            $this->facebook = '';
            $this->instagram = '';
            $this->youtube = '';
            $this->linkedin = '';
        }
    }

    public function update(HeaderRepositoryInterface $headerRepo)
    {
        $headerRepo->updateHeader($this->hotline, $this->email, $this->facebook, $this->instagram, $this->youtube, $this->linkedin);

        $this->dispatch('$refresh')->to('header.header-show');
    }

    public function render()
    {
        return view('admins.header.livewire.header-show');
    }
}
