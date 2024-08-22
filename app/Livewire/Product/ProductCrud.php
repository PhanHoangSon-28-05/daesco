<?php

namespace App\Livewire\Product;

use App\Models\ImageProduct;
use App\Models\Product;
use App\Repositories\Categorys\CategoryRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use Laravel\Prompts\Prompt;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductCrud extends Component
{
    use WithFileUploads;
    public string $action;
    public $product;

    public $category_id,
        $price,
        $title_en,
        $payload_en,
        $description_en,
        $general_specifications_en,
        $features_en,
        $links;

    //Request
    #[Validate('required|string|max:255', message: 'Chưa tiêu đề')]
    public string $title_vi;

    #[Validate('required|string', message: 'Chưa nhập trọng tải')]
    public string $payload_vi;

    #[Validate('required|string', message: 'Chưa nhập mô tả')]
    public string $description_vi;

    #[Validate('required|string', message: 'Chưa nhập thông tin chung')]
    public string $general_specifications_vi;

    #[Validate('required|string', message: 'Chưa nhập tín năng')]
    public string $features_vi;

    #[Validate(['images.*' => 'required|file|mimes:png,jpg,pdf'], message: 'Chưa nhập nội dung')]
    public $images = [];


    public function modalSetup($id)
    {
        // dd($id);
        if ($id == 0) {
            $this->action = 'create';
        } elseif ($id > 0) {
            $this->action = 'update';
        } else {
            $this->action = 'delete';
        }

        $this->product = Product::find(abs($id));
        $this->getData();
    }

    public function getData()
    {
        if ($this->product) {
            $this->category_id = $this->product->category_id;
            $this->title_vi = $this->product->title_vi ?? 'Thông tin chưa nhập';
            $this->payload_vi = $this->product->payload_vi ?? '0';
            $this->description_vi = $this->product->description_vi ?? 'Thông tin chưa nhập';
            $this->title_en = $this->product->title_en;
            $this->payload_en = $this->product->payload_en;
            $this->description_en = $this->product->description_en;
            $this->general_specifications_vi = $this->product->general_specifications_vi ?? 'Thông tin chưa nhập';
            $this->features_vi = $this->product->features_vi ?? 'Thông tin chưa nhập';
            $this->general_specifications_en = $this->product->general_specifications_en;
            $this->features_en = $this->product->features_en;
            $this->price = $this->product->price;
            $this->links = $this->product->links;
        } else {
            $this->category_id = 0;
            $this->title_vi = '';
            $this->payload_vi = '';
            $this->description_vi = '';
            $this->title_en = '';
            $this->payload_en = '';
            $this->description_en = '';
            $this->general_specifications_vi = '';
            $this->features_vi = '';
            $this->general_specifications_en = '';
            $this->features_en = '';
            $this->price = '';
            $this->images = [];
            $this->links = '';
        }

        $this->resetErrorBag();
    }

    public function create(ProductRepositoryInterface $productRepo)
    {
        // dd($this->general_specifications_vi);
        $this->validate();
        $product = $productRepo->createProduct(
            $this->category_id,
            $this->title_vi,
            $this->payload_vi,
            $this->description_vi,
            $this->title_en,
            $this->payload_en,
            $this->description_en,
            $this->general_specifications_vi,
            $this->features_vi,
            $this->general_specifications_en,
            $this->features_en,
            $this->price,
            $this->links
        );

        $productImage = $productRepo->UploadImageProduct($product->id, $this->images);

        $this->images = [];
        $this->dispatch('refreshList')->to('product.product-list');
        $this->dispatch('closeCrudProduct');
    }

    public function update(ProductRepositoryInterface $productRepo)
    {
        $this->validate();
        $product = $productRepo->updateProduct(
            $this->product,
            $this->category_id,
            $this->title_vi,
            $this->payload_vi,
            $this->description_vi,
            $this->title_en,
            $this->payload_en,
            $this->description_en,
            $this->general_specifications_vi,
            $this->features_vi,
            $this->general_specifications_en,
            $this->features_en,
            $this->price,
            $this->links
        );

        $this->dispatch('refreshList')->to('product.product-list');
        $this->dispatch('closeCrudProduct');
    }

    public function delete(ProductRepositoryInterface $productRepo)
    {
        $productRepo->deleteProduct($this->product);

        $this->dispatch('refreshList')->to('product.product-list');
        $this->dispatch('closeCrudProduct');
    }


    public function render(CategoryRepositoryInterface $categoryRepo)
    {
        $categories = $categoryRepo->getAll();
        return view('admins.products.livewire.product-crud', [
            'categories' => $categories
        ]);
    }
}
