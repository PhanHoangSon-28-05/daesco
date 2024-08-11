<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;

class PostList extends Component
{
    protected $listeners = [
        'refreshList' => '$refresh'
    ];
    public function render()
    {
        // $posts = Post::paginate(10);
        $posts = Post::all();
        // dd($posts);
        return view('admins.posts.livewire.post-list', ['posts' => $posts]);
    }
}
