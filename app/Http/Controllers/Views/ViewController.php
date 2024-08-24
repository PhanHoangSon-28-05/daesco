<?php

namespace App\Http\Controllers\Views;

use App\Models\Info;
use App\Models\Footer;
use App\Models\Header;
use App\Models\Slider;
use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use App\Repositories\Post\PostRepositoryInterface;
use App\Repositories\Years\YearRepositoryInterface;
use App\Repositories\Sliders\SliderRepositoryInterface;
use App\Repositories\Systems\SystemRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Services\ServiceRepositoryInterface;
use App\Repositories\Categorys\CategoryRepositoryInterface;
use App\Repositories\Documents\DocumentRepositoryInterface;
use App\Repositories\Developments\DevelopmentRepositoryInterface;

class ViewController extends Controller
{
    protected $cateRepo;
    protected $serviceRepo;
    protected $prodRepo;
    protected $postRepo;
    protected $sliderRepo;
    protected $developmentRepo;
    protected $systemRepo;
    protected $documentRepo;
    protected $yearRepo;

    public function __construct(
        CategoryRepositoryInterface $cateRepo,
        ServiceRepositoryInterface $serviceRepo,
        ProductRepositoryInterface $prodRepo,
        PostRepositoryInterface $postRepo,
        SliderRepositoryInterface $sliderRepo,
        DevelopmentRepositoryInterface $developmentRepo,
        SystemRepositoryInterface $systemRepo,
        DocumentRepositoryInterface $documentRepo,
        YearRepositoryInterface $yearRepo,
    ) {
        $this->cateRepo = $cateRepo;
        $this->serviceRepo = $serviceRepo;
        $this->prodRepo = $prodRepo;
        $this->postRepo = $postRepo;
        $this->sliderRepo = $sliderRepo;
        $this->developmentRepo = $developmentRepo;
        $this->systemRepo = $systemRepo;
        $this->documentRepo = $documentRepo;
        $this->yearRepo = $yearRepo;
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
        $cate = $this->cateRepo->getCateSlug("development-apparatus");
        $attributes['cate'] = $cate;

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
        $cate = $this->cateRepo->getCateSlug("sustainable-development");
        $attributes['cate'] = $cate;

        $result = array_merge($attributes, $this->get());
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

    public function shareholders(Request $request, ?string $subCate = '')
    {
        $cate = $this->cateRepo->getCateSlug("shareholders");
        $attributes['cate'] = $cate;

        $selected_year = $request->input('nam_ph');
        $categories = $this->cateRepo->getChildNew(3);
        $years = $this->yearRepo->getAll()->sortByDesc('name');
        $category = $this->cateRepo->getCateSlug($subCate);
        $params = [
            'category_id' => $category->id ?? '',
            'year' => $selected_year,
        ];
        $documents = $this->documentRepo->getPaginatedListDocumentsByParams($params, 10, 'desc');

        $attributes['categories'] = $categories;
        $attributes['years'] = $years;
        $attributes['selected_year'] = $selected_year;
        $attributes['documents'] = $documents;

        Session::put('shareholders', $subCate);

        $result = array_merge($attributes, $this->get());
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
        $cate = $this->cateRepo->getCateSlug("library");
        $attributes['cate'] = $cate;

        $result = array_merge($attributes, $this->get());
        return view(
            'view.thu-vien',
            $result
        );
    }

    public function recruitment()
    {
        return view(
            // 'view.tuyen-dung',
            'view.erro',
            $this->get()
        );
    }

    public function contact()
    {
        $cate = $this->cateRepo->getCateSlug("contact");
        $attributes['cate'] = $cate;

        $result = array_merge($attributes, $this->get());
        return view(
            'view.lien-he',
            $result
        );
    }
}
