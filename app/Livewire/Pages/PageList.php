<?php

namespace App\Livewire\Pages;

use App\Models\Page;
use Livewire\Component;

class PageList extends Component
{
    protected $listeners = [
        'refreshList' => '$refresh'
    ];
    public function render()
    {
        $pages = Page::all();
        // dd($pages);
        return view('admins.pages.livewire.page-list', ['pages' => $pages]);
    }
}
