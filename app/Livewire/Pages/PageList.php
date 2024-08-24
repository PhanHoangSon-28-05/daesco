<?php

namespace App\Livewire\Pages;

use App\Models\Page;
use Livewire\Component;

class PageList extends Component
{
    public $name = '';

    protected $listeners = [
        'refreshList' => '$refresh'
    ];
    public function render()
    {
        if ($this->name != '') {
            $pages = Page::whereLike('name_vi', '%'.$this->name.'%')->get();
        } else {
            $pages = Page::all();
        }
        // dd($pages);
        return view('admins.pages.livewire.page-list', ['pages' => $pages]);
    }
}
