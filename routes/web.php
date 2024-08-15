<?php

use App\Http\Controllers\Admins\AdsController;
use App\Http\Controllers\Admins\CategoryController;
use App\Http\Controllers\Admins\FooterController;
use App\Http\Controllers\Admins\LoginController;
use App\Http\Controllers\Admins\LogoutController;
use App\Http\Controllers\Admins\RegisterController;
use App\Http\Controllers\Admins\RoleController;
use App\Http\Controllers\Admins\HeaderController;
use App\Http\Controllers\Admins\InfoController;
use App\Http\Controllers\Admins\ProductController;
use App\Http\Controllers\Admins\SliderController;
use App\Http\Controllers\Admins\YearController;
use App\Http\Controllers\Admins\InfoProductController;
use App\Http\Controllers\Admins\PageController;
use App\Http\Controllers\Admins\PostController;
use App\Http\Controllers\Admins\ServiceController;
use App\Http\Controllers\Admins\UserController;
use App\Http\Controllers\Image\ImageController;
use App\Http\Controllers\Views\ViewController;
use App\Models\Ads;
use App\Models\Category;
use App\Models\Info;
use App\Models\Page;
use App\Models\Post;
use App\Models\Product;
use App\Models\Role;
use App\Models\Service;
use App\Models\Slider;
use App\Models\User;
use App\Models\View;
use App\Models\Year;
use App\Repositories\Categorys\CategoryRepositoryInterface;
use Illuminate\Support\Facades\Route;
use LivewireFilemanager\Filemanager\Http\Controllers\Files\FileController;



Route::get('/', function () {
    return view('view.trang-chu');
});

Route::get('/admin/dashboard', function () {
    return view('admins.layouts.master');
})->name('admin.dashboard')->middleware('auth');

/**
 * View Client
 */


$categoryRepository = app(CategoryRepositoryInterface::class);
$categories = $categoryRepository->getCateSlugNoChill();
Route::group([], function () use ($categories) {
    if (count($categories) > 0) {
        Route::get($categories[0]->slug, [ViewController::class, 'index'])->name(strtolower($categories[0]->name_en));
    }

    if (count($categories) > 1) {
        Route::get($categories[1]->slug, [ViewController::class, 'introduce'])->name(strtolower($categories[1]->name_en));
    }

    if (count($categories) > 2) {
        Route::get($categories[2]->slug, [ViewController::class, 'recruitment'])->name(strtolower($categories[2]->name_en));
    }

    if (count($categories) > 3) {
        Route::get($categories[3]->slug, [ViewController::class, 'contact'])->name(strtolower($categories[3]->name_en));
    }


    Route::group(['prefix' => '/category'], function () {
        Route::get('/{slug}', [ViewController::class, 'page_category_product'])->name(View::PAGE_CATE_PRO);
        Route::get('/{slug}/{slugDetail}', [ViewController::class, 'detailnews'])->name('datile.news');
    });
});



/**
 * Login Routes
 */
Route::get('admin/login', [LoginController::class, 'show'])->name('login.show');
Route::post('admin/login', [LoginController::class, 'login'])->name('login.perform');
/**
 * Logout Routes
 */
Route::get('admin/logout', [LogoutController::class, 'perform'])->name('logout.perform');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('roles', [RoleController::class, 'index'])->name(Role::INDEX);
    Route::get('users', [UserController::class, 'index'])->name(User::INDEX);
    Route::get('categories', [CategoryController::class, 'index'])->name(Category::INDEX);
    Route::get('products', [ProductController::class, 'index'])->name(Product::INDEX);
    Route::get('pages', [PageController::class, 'index'])->name(Page::INDEX);
    Route::get('services', [ServiceController::class, 'index'])->name(Service::INDEX);
    Route::get('sliders', [SliderController::class, 'index'])->name(Slider::INDEX);
    Route::get('years', [YearController::class, 'index'])->name(Year::INDEX);
    Route::get('headers', [HeaderController::class, 'index'])->name('headers.index');
    Route::get('footers', [FooterController::class, 'index'])->name('footers.index');
    Route::get('info-products', [InfoProductController::class, 'index'])->name('info-products.index');
    Route::get('ads', [AdsController::class, 'index'])->name(Ads::INDEX);
    Route::get('infos', [InfoController::class, 'index'])->name(Info::INDEX);
    Route::get('posts', [PostController::class, 'index'])->name(Post::INDEX);
    Route::get('/posts/filter', [PostController::class, 'filter'])->name('posts.filter');
    Route::get('/posts/search', [PostController::class, 'search'])->name('posts.search');

    Route::get('filemanager?', function () {
        return view('admins.layouts.filemanager');
    })->name('filemanager');
});
Route::get('storages/{folder?}/{size?}/{name?}', [ImageController::class, 'getImage'])->name('storages.image');
Route::get('{path}', [FileController::class, 'show'])->where('path', '.*')->name('assets.show');
