<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use App\Models\Year;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class PostList extends Component
{
    use WithPagination;

    public $years;
    public $selected_year;
    public $cates;
    public $name;
    public $category_id;

    protected $listeners = [
        'refreshList' => '$refresh'
    ];

    public function mount() {
        $this->cates = Category::where('parent_id', '<>', 0)->get();
        $this->years = Year::orderBy('name', 'desc')->get();
    }

    public function updated($field) {
        if (in_array($field, ['name', 'category_id', 'selected_year'])) $this->resetPage();
    }

    public function getListPost() {
        $posts = Post::query();

        if (isset($this->name) && $this->name != '') {
            $posts->where('name_vi', 'like', '%'.$this->name.'%');
        }

        if (isset($this->category_id) && $this->category_id != '') {
            $posts->where('category_id', $this->category_id);
        }

        if (isset($this->selected_year) && $this->selected_year != '') {
            $posts->whereYear('created_at', $this->selected_year);
        }

        return $posts->paginate(10);
    }

    public function render()
    {
        // $posts = Post::paginate(10);
        // $posts = Post::all();
        $posts = $this->getListPost();
        // dd($posts);
        return view('admins.posts.livewire.post-list', [
            'posts' => $posts
        ]);
    }
}
