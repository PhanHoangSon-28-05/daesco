<?php

namespace App\Livewire\Posts;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{
    use WithPagination;

    protected $listeners = [
        'refreshList' => '$refresh'
    ];
    public function render()
    {
        $posts = Post::paginate(10);
        // $posts = Post::all();
        $cates = Category::where('parent_id', '<>', 0)->get();
        // dd($posts);
        return view('admins.posts.livewire.post-list', [
            'posts' => $posts,
            'cates' => $cates
        ]);
    }
}
