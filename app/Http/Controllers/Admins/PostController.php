<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->input('search');
        $posts = Post::where('name_vi', 'LIKE', "%{$search}%")
            ->orWhere('description_vi', 'LIKE', "%{$search}%")
            ->orWhereHas('category', function ($query) use ($search) {
                $query->where('name_vi', 'LIKE', "%{$search}%")
                    ->orWhere('name_en', 'LIKE', "%{$search}%");
            })
            ->paginate(10);

        return response()->json([
            'html' => view('admins.posts.livewire.partials.post-table', compact('posts'))->render(),
            'pagination' => $posts->links()->render()
        ]);
    }

    public function filter(Request $request)
    {
        $posts = $request->category_id ?
            Post::where('category_id', $request->category_id)->orderBy('created_at', 'DESC')->get() :
            Post::all();

        return view('admins.posts.livewire.partials.post-table', compact('posts'))->render();
    }

    public function index()
    {
        return view('admins.posts.index');
    }
}
