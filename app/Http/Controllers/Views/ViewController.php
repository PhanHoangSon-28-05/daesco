<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Footer;
use App\Models\Header;
use App\Models\Service;
use App\Models\Slider;
use App\Repositories\Categorys\CategoryRepositoryInterface;
use App\Repositories\Post\PostRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Services\ServiceRepositoryInterface;
use App\Repositories\Sliders\SliderRepositoryInterface;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    protected $cateRepo;
    protected $serviceRepo;
    protected $prodRepo;
    protected $postRepo;
    protected $sliderRepo;

    public function __construct(
        CategoryRepositoryInterface $cateRepo,
        ServiceRepositoryInterface $serviceRepo,
        ProductRepositoryInterface $prodRepo,
        PostRepositoryInterface $postRepo,
        SliderRepositoryInterface $sliderRepo,
    ) {
        $this->cateRepo = $cateRepo;
        $this->serviceRepo = $serviceRepo;
        $this->prodRepo = $prodRepo;
        $this->postRepo = $postRepo;
        $this->sliderRepo = $sliderRepo;
    }

    public function get()
    {
        $header = Header::all()->first();
        $cate = $this->cateRepo->getCate();
        $footer = Footer::all()->first();
        $cateSearchPro = $this->cateRepo->getAll();
        $cateSearchPosts = $this->postRepo->getPost();

        return [ //Header
            'header' => $header,
            'cateSearchPro' => $cateSearchPro,
            'cates' => $cate,
            'cateSearchPosts' => $cateSearchPosts,
            // /Header

            'footer' => $footer,
        ];
    }

    public function index()
    {
        $slugCate = 'company-regulations-and-regulations';
        $sliders = $this->sliderRepo->getSlider();
        $cateFieldOperation = $this->cateRepo->getFieldOperation();
        $posttakes = $this->cateRepo->getCateSlugtoPost($slugCate)->take(5);
        $getIntroduce = $this->cateRepo->getIntroduce();


        $attributes['slugCate'] = $slugCate;
        $attributes['getIntroduce'] = $getIntroduce;
        $attributes['posts'] = $posttakes;
        $attributes['cateFieldOperations'] = $cateFieldOperation;
        $attributes['sliders'] = $sliders;

        $result = array_merge($attributes, $this->get());
        return view(
            'view.trang-chu',
            $result
        );
    }

    public function aboutus()
    {
        $cate = $this->cateRepo->getCateSlug("about-us");
        $attributes['cate'] = $cate;

        $result = array_merge($attributes, $this->get());
        return view(
            'view.tong-quan',
            $result
        );
    }

    public function developmentApparatus()
    {
        $result = array_merge($this->get());
        return view(
            'view.bo-may-phat-trien',
            $result
        );
    }

    public function sustainableDevelopment()
    {
        $result = array_merge($this->get());
        return view(
            'view.phat-trien-ben-vung',
            $result
        );
    }

    public function mitshubishi()
    {
        $cate = $this->cateRepo->getCateSlug("mitshubishi");
        $services = Service::all();
        $products = $this->prodRepo->getAll();

        $attributes['products'] = $products;
        $attributes['services'] = $services;
        $attributes['cate'] = $cate;

        $result = array_merge($attributes, $this->get());
        return view(
            'view.san-pham',
            $result
        );
    }

    public function shareholders()
    {
        $result = array_merge($this->get());
        return view(
            'view.quan-he-co-dong',
            $result
        );
    }

    public function companyrRgulationsRegulations()
    {
        $posts = $this->cateRepo->getCateSlugtoPost('company-regulations-and-regulations');

        $attributes['posts'] = $posts;
        $result = array_merge($attributes, $this->get());
        return view(
            'view.tin-tuc-su-kien',
            $result
        );
    }

    public function detailnews($slugDetail)
    {
        $postDetail = $this->postRepo->getSlug($slugDetail);
        $posts = $this->cateRepo->getCateSlugtoPost('company-regulations-and-regulations');

        $attributes['posts'] = $posts;
        $attributes['postDetail'] = $postDetail;

        $result = array_merge($attributes, $this->get());

        return view('view.chi-tiet-tin-tuc', $result);
    }

    public function library()
    {
        $result = array_merge($this->get());
        return view(
            'view.thu-vien',
            $result
        );
    }

    public function recruitment()
    {
        return view(
            'view.tuyen-dung',
            $this->get()
        );
    }

    public function contact()
    {
        return view(
            'view.lien-he',
            $this->get()
        );
    }
}
