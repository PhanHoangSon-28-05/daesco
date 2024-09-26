<?php

namespace App\Repositories\Post;

use App\Repositories\BaseRepository;
use App\Repositories\Post\PostRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Post::class;
    }

    public function getPost()
    {
        return $this->model->all();
    }

    public function createPost(
        $category_id,
        $name_vi,
        $description_vi,
        $name_en,
        $description_en,
        $detail_vi,
        $detail_en,
        $pic,
        $year_id
    ) {
        if ($pic) {
            $extension = $pic->getClientOriginalName();
            $filename = time() . '_' . $extension;

            $path =  $pic->storeAs('posts', $filename, 'public');
        } else {
            $path = '';
        }
        $postData = [
            'category_id' => $category_id,
            'user_id' => Auth::id(),
            'name_vi' => trim($name_vi),
            'description_vi' => trim($description_vi),
            'name_en' => trim($name_en),
            'description_en' => trim($description_en),
            'detail_vi' => trim($detail_vi),
            'detail_en' => trim($detail_en),
            'pic' => $path,
            'years_id' => $year_id,
        ];

        if ($name_en) {
            $postData['slug'] = Str::slug($name_en);
        } else {
            $postData['slug'] = Str::slug($name_vi);
        }

        // dd($postData);

        $post = $this->model->create($postData);

        return $post;
    }

    public function updatePost(
        $postModel,
        $category_id,
        $name_vi,
        $description_vi,
        $name_en,
        $description_en,
        $detail_vi,
        $detail_en,
        $pic,
        $year_id
    ) {
        if ($pic != $postModel->pic) {
            Storage::disk('public')->delete($postModel->pic);
            $extension = $pic->getClientOriginalName();
            $filename = time() . '_' . $extension;

            $path =  $pic->storeAs('posts', $filename, 'public');
        } else {
            $path = $postModel->pic;
        }

        $postData = [
            'category_id' => $category_id,
            'name_vi' => trim($name_vi),
            'description_vi' => trim($description_vi),
            'name_en' => trim($name_en),
            'description_en' => trim($description_en),
            'detail_vi' => trim($detail_vi),
            'detail_en' => trim($detail_en),
            'pic' => $path,
            'years_id' => $year_id,
        ];
        if ($name_en) {
            $postData['slug'] = Str::slug($name_en);
        } else {
            $postData['slug'] = Str::slug($name_vi);
        }
        $post = $postModel->update($postData);

        return $post;
    }

    public function deletePost($postModel)
    {
        Storage::disk('public')->delete($postModel->pic);

        return $postModel->delete();
    }

    // Views

    public function getPostCate($id)
    {
        $posts = $this->model->where('category_id', $id)->orderBy('created_at', 'ASC')->get();
        return $posts;
    }
    public function getSlug($slug)
    {
        $posts = $this->model->where('slug', $slug)->get()->first();
        return $posts;
    }

    public function getMainPage()
    {
        return $this->model->whereIn('category_id', [])->get();
    }
}
