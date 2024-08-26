<?php

namespace App\Livewire\Pages;

use App\Models\Page;
use App\Models\Year;
use Livewire\Component;

class PageList extends Component
{
    public $name;
    public $years;
    public $selected_year;

    protected $listeners = [
        'refreshList' => '$refresh'
    ];

    public function mount() {
        $this->years = Year::orderBy('name', 'desc')->get();
    }

    public function getListPages() {
        $pages = Page::query();

        if (isset($this->name) && $this->name != '') {
            $pages->whereLike('name_vi', '%'.$this->name.'%')->get();
        }

        if (isset($this->selected_year) && $this->selected_year != '') {
            $pages->whereYear('created_at', $this->selected_year)->get();
        }

        return $pages->get();
    }

    public function render()
    {
        $pages = $this->getListPages();
        // if ($this->name != '') {
        //     $pages = Page::whereLike('name_vi', '%'.$this->name.'%')->get();
        // } else {
        //     $pages = Page::all();
        // }
        // dd($pages);
        return view('admins.pages.livewire.page-list', ['pages' => $pages]);
    }
}
