<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(
            \App\Repositories\Roles\RoleRepositoryInterface::class,
            \App\Repositories\Roles\RoleRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Headers\HeaderRepositoryInterface::class,
            \App\Repositories\Headers\HeaderRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Footers\FooterRepositoryInterface::class,
            \App\Repositories\Footers\FooterRepository::class
        );
        $this->app->singleton(
            \App\Repositories\InfoProducts\InfoProductRepositoryInterface::class,
            \App\Repositories\InfoProducts\InfoProductRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Categorys\CategoryRepositoryInterface::class,
            \App\Repositories\Categorys\CategoryRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Product\ProductRepositoryInterface::class,
            \App\Repositories\Product\ProductRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Page\PageRepositoryInterface::class,
            \App\Repositories\Page\PageRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Services\ServiceRepositoryInterface::class,
            \App\Repositories\Services\ServiceRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Sliders\SliderRepositoryInterface::class,
            \App\Repositories\Sliders\SliderRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Ads\AdsRepositoryInterface::class,
            \App\Repositories\Ads\AdsRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Infos\InfoRepositoryInterface::class,
            \App\Repositories\Infos\InfoRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Post\PostRepositoryInterface::class,
            \App\Repositories\Post\PostRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Developments\DevelopmentRepositoryInterface::class,
            \App\Repositories\Developments\DevelopmentRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Systems\SystemRepositoryInterface::class,
            \App\Repositories\Systems\SystemRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Documents\DocumentRepositoryInterface::class,
            \App\Repositories\Documents\DocumentRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Years\YearRepositoryInterface::class,
            \App\Repositories\Years\YearRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Recruits\RecruitRepositoryInterface::class,
            \App\Repositories\Recruits\RecruitRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         // \URL::forceScheme('https');
        Paginator::useBootstrap();
    }
}
