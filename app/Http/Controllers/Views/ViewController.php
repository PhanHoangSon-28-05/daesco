<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Footer;
use App\Models\Header;
use App\Repositories\Categorys\CategoryRepositoryInterface;
use App\Repositories\Post\PostRepositoryInterface;
use App\Repositories\Services\ServiceRepositoryInterface;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    protected $cateRepo;
    protected $serviceRepo;
    protected $postRepo;

    public function __construct(
        CategoryRepositoryInterface $cateRepo,
        ServiceRepositoryInterface $serviceRepo,
        PostRepositoryInterface $postRepo,
    ) {
        $this->cateRepo = $cateRepo;
        $this->serviceRepo = $serviceRepo;
        $this->postRepo = $postRepo;
    }

    public function get()
    {
        $header = Header::all()->first();
        $cate = $this->cateRepo->getCate();
        $footer = Footer::all()->first();
        return [ //Header
            'header' => $header,
            'cates' => $cate,
            // /Header

            'footer' => $footer,
        ];
    }

    public function index()
    {
        $catepro = $this->cateRepo->getCateType(2);
        $posttakes = $this->cateRepo->getCateSlugtoPost('company-regulations-and-regulations')->take(5);
        $getIntroduce = $this->cateRepo->getIntroduce();

        $attributes['getIntroduce'] = $getIntroduce;
        $attributes['posts'] = $posttakes;
        $attributes['catepros'] = $catepro;

        $result = array_merge($attributes, $this->get());
        return view(
            'view.trang-chu',
            $result
        );
    }
    public function introduce()
    {
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
