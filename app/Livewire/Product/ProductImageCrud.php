<?php

namespace App\Livewire\Product;

use App\Models\ImageProduct;
use App\Models\Product;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductImageCrud extends Component
{
    use WithFileUploads;

    public $product;
    public $product_id;
    public string $title_vi, $title_en;
    public $imagesData;


    #[Validate(['images.*' => 'required|file|mimes:png,jpg,pdf'], message: 'Chưa nhập nội dung')]
    public $images = [];

    public function getData($id)
    {
        $this->product = Product::find(abs($id));
        $this->product_id = $this->product->id;
        $this->title_vi = $this->product->title_vi;
        $this->imagesData = ImageProduct::where('product_id', $id)->get();
        if ($this->product->title_en == null) {
            $this->title_en = '';
        } else {
            $this->title_en = $this->product->title_en;
        }
        $this->resetErrorBag();
    }

    public function updateImage(ProductRepositoryInterface $productRepo)
    {
        $this->validate();

        $productImage = $productRepo->UploadImageProduct($this->product_id, $this->images);

        $this->images = [];
        $this->imagesData = ImageProduct::where('product_id', $this->product_id)->get();
    }

    public function selectImage($id, ProductRepositoryInterface $productRepo)
    {
        $img = ImageProduct::find($id)->image;
        $productImage = $productRepo->selectProduct($this->product_id, $img);

        $this->imagesData = ImageProduct::where('product_id', $this->product_id)->get();

        $this->product = $productRepo->find($this->product_id);
    }


    public function deleteImage($id)
    {
        $img = ImageProduct::find($id);
        Storage::disk('public')->delete($img->image);
        $img->delete();
        $this->imagesData = ImageProduct::where('product_id', $this->product_id)->get();
    }

    public function render()
    {
        return view('admins.products.livewire.product-image-crud');
    }
}
