<?php

namespace App\Livewire\Posts;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{
    use WithPagination;

    public $cates;
    public $name;
    public $category_id;

    protected $listeners = [
        'refreshList' => '$refresh'
    ];

    public function mount() {
        $this->cates = Category::where('parent_id', '<>', 0)->get();
    }

    public function updatedName() {
        $this->resetPage();
    }

    public function updatedCategoryId() {
        $this->resetPage();
    }

    public function getListPost() {
        $posts = Post::query();

        if (isset($this->name) && $this->name != '') {
            $posts->where('name_vi', 'like', '%'.$this->name.'%');
        }

        if (isset($this->category_id) && $this->category_id != '') {
            $posts->where('category_id', $this->category_id);
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
