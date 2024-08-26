<?php

use App\Models\Ads;
use App\Models\Info;
use App\Models\Page;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use App\Models\View;
use App\Models\Year;
use App\Models\Slider;
use App\Models\System;
use App\Models\Product;
use App\Models\Service;
use App\Models\Category;
use App\Models\Document;
use App\Models\Development;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admins\AdsController;
use App\Http\Controllers\Views\ViewController;
use App\Http\Controllers\Admins\InfoController;
use App\Http\Controllers\Admins\PageController;
use App\Http\Controllers\Admins\PostController;
use App\Http\Controllers\Admins\RoleController;
use App\Http\Controllers\Admins\UserController;
use App\Http\Controllers\Admins\YearController;
use App\Http\Controllers\Image\ImageController;
use App\Http\Controllers\Admins\LoginController;
use App\Http\Controllers\Admins\FooterController;
use App\Http\Controllers\Admins\HeaderController;
use App\Http\Controllers\Admins\LogoutController;
use App\Http\Controllers\Admins\SliderController;
use App\Http\Controllers\Admins\SystemController;
use App\Http\Controllers\Admins\ProductController;
use App\Http\Controllers\Admins\ServiceController;
use App\Http\Controllers\Admins\CategoryController;
use App\Http\Controllers\Admins\DocumentController;
use App\Http\Controllers\Admins\RegisterController;
use App\Http\Controllers\Admins\DevelopmentController;
use App\Http\Controllers\Admins\InfoProductController;
use App\Http\Controllers\Admins\OrganizationalController;
use App\Models\Organizational;
use App\Repositories\Categorys\CategoryRepositoryInterface;
use LivewireFilemanager\Filemanager\Http\Controllers\Files\FileController;




/**
 * View Client
 */
Route::get('/', [ViewController::class, 'index'])->name('home');
Route::get('/about-us', [ViewController::class, 'aboutus'])->name('about-us');
Route::get('/bo-may-phat-trien/{subCate?}', [ViewController::class, 'developmentApparatus'])->name('development-apparatus');
Route::get('/phat-trien-ben-vung', [ViewController::class, 'sustainableDevelopment'])->name('sustainable-development');
Route::get('/san-pham-mitshubishi', [ViewController::class, 'mitshubishi'])->name('mitshubishi');
Route::get('/dich-vu-bai', [ViewController::class, 'warehouse'])->name('warehouse-business');
Route::get('/quan-he-co-dong/{subCate?}', [ViewController::class, 'shareholders'])->name('shareholders');
Route::get('/tuyen-dung-moi-thau', [ViewController::class, 'recruitment'])->name('recruitment');
Route::get('/tin-tuc-su-kien', [ViewController::class, 'companyrRgulationsRegulations'])->name('company-regulations-and-regulations');
Route::get('/tin-tuc-su-kien/{slugDetail}', [ViewController::class, 'detailnews'])->name('datile.news');
Route::get('/truyen-thong', [ViewController::class, 'library'])->name('library');
Route::get('/lien-he', [ViewController::class, 'contact'])->name('contact');



// Route::group(['prefix' => '/category'], function () {
//     Route::get('/{slug}', [ViewController::class, 'page_category_product'])->name(View::PAGE_CATE_PRO);
//     Route::get('/{slug}/{slugDetail}', [ViewController::class, 'detailnews'])->name('datile.news');
// });



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
    Route::get('/dashboard', function () {
        return view('admins.layouts.master');
    })->name('admin.dashboard');
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
    Route::get('developments', [DevelopmentController::class, 'index'])->name(Development::INDEX);
    Route::get('systems', [SystemController::class, 'index'])->name(System::INDEX);
    Route::get('documents', [DocumentController::class, 'index'])->name(Document::INDEX);
    Route::get('organizationals', [OrganizationalController::class, 'index'])->name(Organizational::INDEX);

    Route::get('filemanager?', function () {
        return view('admins.layouts.filemanager');
    })->name('filemanager');
});
Route::get('/document/add-download-count', [DocumentController::class, 'addDownloadCount'])->name('document.add-download-count');
Route::get('storages/{folder?}/{size?}/{name?}', [ImageController::class, 'getImage'])->name('storages.image');
Route::get('{path}', [FileController::class, 'show'])->where('path', '.*')->name('assets.show');
