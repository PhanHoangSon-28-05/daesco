<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use App\Models\Year;
use App\Repositories\Categorys\CategoryRepositoryInterface;
use App\Repositories\Post\PostRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class PostCrud extends Component
{
    use WithFileUploads;
    public $action,
        $post,
        $name_en,
        $detail_en,
        $description_en,
        $category_id;

    #[Rule('required|string|max:255', message: 'Chưa tiêu đề')]
    public string $name_vi;
    #[Validate('required|string', message: 'Chưa nhập mô tả')]
    public string $description_vi;
    #[Validate('required|string', message: 'Chưa nhập chi tiết')]
    public string $detail_vi;
    // #[Validate('required|file|mimes:png,jpg,pdf', message: 'Chưa nhập ảnh')]
    public $pic, $year_id;

    public function modalSetup($id)
    {
        if ($id == 0) {
            $this->action = 'create';
        } elseif ($id > 0) {
            $this->action = 'update';
        } else {
            $this->action = 'delete';
        }
        // dd($id);
        $this->post = Post::find(abs($id));
        $this->getData();
    }


    public function getData()
    {
        // dd($this->post);
        if ($this->post) {
            $this->category_id = $this->post->category_id;
            $this->name_vi = $this->post->name_vi;
            $this->detail_vi = $this->post->detail_vi;
            $this->description_vi = $this->post->description_vi;
            $this->name_en = $this->post->name_en;
            $this->detail_en = $this->post->detail_en;
            $this->description_en = $this->post->description_en;
            $this->pic = $this->post->pic;
            $this->year_id = $this->post->years_id;
        } else {
            $this->category_id = '';
            $this->name_vi = '';
            $this->detail_vi = '';
            $this->description_vi = '';
            $this->name_en = '';
            $this->detail_en = '';
            $this->description_en = '';
            $this->pic = '';
            $this->year_id = '';
        }

        $this->resetErrorBag();
    }

    public function create(PostRepositoryInterface $postRepo)
    {
        $this->validate();
        // dd($this->year_id);
        $post = $postRepo->createpost(
            $this->category_id,
            $this->name_vi,
            $this->description_vi,
            $this->name_en,
            $this->description_en,
            $this->detail_vi,
            $this->detail_en,
            $this->pic,
            $this->year_id,
        );
        $this->dispatch('refreshList')->to('posts.post-list');
        $this->dispatch('closeCrudPost');
    }

    public function update(PostRepositoryInterface $postRepo)
    {
        $this->validate();

        $post = $postRepo->updatepost(
            $this->post,
            $this->category_id,
            $this->name_vi,
            $this->description_vi,
            $this->name_en,
            $this->description_en,
            $this->detail_vi,
            $this->detail_en,
            $this->pic,
            $this->year_id,
        );
        $this->dispatch('refreshList')->to('posts.post-list');
        $this->dispatch('closeCrudPost');
    }

    public function delete(PostRepositoryInterface $postRepo)
    {
        $postRepo->deletepost($this->post);
        $this->dispatch('refreshList')->to('posts.post-list');
        $this->dispatch('closeCrudPost');
    }
    public function render(CategoryRepositoryInterface $categoryRepo)
    {
        $categories = $categoryRepo->getAll();
        $years = Year::orderBy('id', 'DESC')->get();
        return view('admins.posts.livewire.post-crud', [
            'categories' => $categories,
            'years' => $years
        ]);
    }
}
