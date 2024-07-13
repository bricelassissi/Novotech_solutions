<?php

namespace App\Providers;

use App\Services\HomeService;
use App\Services\IHomeService;
use App\Services\ISearchArtisansService;
use App\Services\SearchArtisansService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public $bindings = [
        IHomeService::class => HomeService::class,
        ISearchArtisansService::class => SearchArtisansService::class,
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
