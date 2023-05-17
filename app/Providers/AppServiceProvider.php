<?php

namespace App\Providers;

use App\Repositories\Penjualan\PenjualanRepository;
use App\Repositories\Penjualan\PenjualanRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
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
