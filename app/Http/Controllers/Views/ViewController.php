<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Footer;
use App\Models\Header;
use App\Models\Info;
use App\Models\Service;
use App\Models\Slider;
use App\Repositories\Categorys\CategoryRepositoryInterface;
use App\Repositories\Developments\DevelopmentRepositoryInterface;
use App\Repositories\Post\PostRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Services\ServiceRepositoryInterface;
use App\Repositories\Sliders\SliderRepositoryInterface;
use App\Repositories\Systems\SystemRepositoryInterface;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    protected $cateRepo;
    protected $serviceRepo;
    protected $prodRepo;
    protected $postRepo;
    protected $sliderRepo;
    protected $developmentRepo;
    protected $systemRepo;

    public function __construct(
        CategoryRepositoryInterface $cateRepo,
        ServiceRepositoryInterface $serviceRepo,
        ProductRepositoryInterface $prodRepo,
        PostRepositoryInterface $postRepo,
        SliderRepositoryInterface $sliderRepo,
        DevelopmentRepositoryInterface $developmentRepo,
        SystemRepositoryInterface $systemRepo,
    ) {
        $this->cateRepo = $cateRepo;
        $this->serviceRepo = $serviceRepo;
        $this->prodRepo = $prodRepo;
        $this->postRepo = $postRepo;
        $this->sliderRepo = $sliderRepo;
        $this->developmentRepo = $developmentRepo;
        $this->systemRepo = $systemRepo;
    }

    public function get()
    {
        $header = Header::all()->first();
        $cate = $this->cateRepo->getCate();
        $footer = Footer::all()->first();
        $cateSearchPro = $this->cateRepo->getAll();
        $cateSearchPosts = $this->postRepo->getPost();

        $hotlines = Info::all();

        return [ //Header
            'header' => $header,
            'cateSearchPro' => $cateSearchPro,
            'cates' => $cate,
            'cateSearchPosts' => $cateSearchPosts,
            'hotlines' => $hotlines,
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
        $developments = $this->developmentRepo->getAsc();
        $systems = $this->systemRepo->getAll();

        $attributes['developments'] = $developments;
        $attributes['systems'] = $systems;
        $result = array_merge($attributes, $this->get());
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
        $services = $this->serviceRepo->getSlugSv('dich-vu-san-pham');
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

    public function warehouse()
    {
        $cate = $this->cateRepo->getCateSlug("warehouse-business");
        $services = $this->serviceRepo->getSlugSv('dich-vu-bai');

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
