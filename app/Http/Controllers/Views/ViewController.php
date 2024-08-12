<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Footer;
use App\Models\Header;
use App\Models\Slider;
use App\Repositories\Categorys\CategoryRepositoryInterface;
use App\Repositories\Post\PostRepositoryInterface;
use App\Repositories\Services\ServiceRepositoryInterface;
use App\Repositories\Sliders\SliderRepositoryInterface;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    protected $cateRepo;
    protected $serviceRepo;
    protected $postRepo;
    protected $sliderRepo;

    public function __construct(
        CategoryRepositoryInterface $cateRepo,
        ServiceRepositoryInterface $serviceRepo,
        PostRepositoryInterface $postRepo,
        SliderRepositoryInterface $sliderRepo,
    ) {
        $this->cateRepo = $cateRepo;
        $this->serviceRepo = $serviceRepo;
        $this->postRepo = $postRepo;
        $this->sliderRepo = $sliderRepo;
    }

    public function get()
    {
        $header = Header::all()->first();
        $cate = $this->cateRepo->getCate();
        $footer = Footer::all()->first();
        $cateSearchPro = $this->cateRepo->getCateType(2);
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
        $catepro = $this->cateRepo->getCateType(2);
        $posttakes = $this->cateRepo->getCateSlugtoPost($slugCate)->take(5);
        $getIntroduce = $this->cateRepo->getIntroduce();
        $sliders = $this->sliderRepo->getSlider();


        $attributes['slugCate'] = $slugCate;
        $attributes['getIntroduce'] = $getIntroduce;
        $attributes['posts'] = $posttakes;
        $attributes['catepros'] = $catepro;
        $attributes['sliders'] = $sliders;

        $result = array_merge($attributes, $this->get());
        return view(
            'view.trang-chu',
            $result
        );
    }
    public function introduce()
    {
        $slugCate = 'company-regulations-and-regulations';
        $catepro = $this->cateRepo->getCateSlug('gioi-thieu');
        $posttakes = $this->postRepo->getDESC(5);
        $catetype = $this->cateRepo->getCateType(2);

        $attributes['catetypes'] = $catetype;
        $attributes['posttakes'] = $posttakes;
        $attributes['catepro'] = $catepro;

        $result = array_merge($attributes, $this->get());
        return view(
            'view.tong-quan',
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

    public function page_category_product($slug)
    {
        $catepro = $this->cateRepo->getCateSlug($slug);
        $posts = $this->cateRepo->getCateSlugtoPost($slug);
        $posttakes = $this->postRepo->getDESC(5);
        $catetype = $this->cateRepo->getCateType(2);
        $services = $this->serviceRepo->getAll();

        $attributes['slugCate'] = $slug;
        $attributes['catepros'] = $catepro;
        $attributes['catetypes'] = $catetype;
        $attributes['posts'] = $posts;
        $attributes['posttakes'] = $posttakes;
        $attributes['services'] = $services;

        $result = array_merge($attributes, $this->get());

        if ($catepro->type == 2) {
            return view('view.linh-vuc-hoat-dong', $result);
        } else {
            return view('view.tin-tuc-su-kien', $result);
        }
    }

    public function detailnews($slug, $slugDetail)
    {
        $posttakes = $this->postRepo->getDESC(5);
        $postDetail = $this->postRepo->getSlug($slugDetail);
        $catetype = $this->cateRepo->getCateType(2);

        $attributes['slugCate'] = $slug;
        $attributes['catetypes'] = $catetype;
        $attributes['posttakes'] = $posttakes;
        $attributes['postDetail'] = $postDetail;

        $result = array_merge($attributes, $this->get());

        return view('view.chi-tiet-tin-tuc', $result);
    }
}
