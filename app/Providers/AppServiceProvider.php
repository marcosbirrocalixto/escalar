<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Core\Eloquent\EloquentProdutoRepository;
use App\Repositories\Contracts\ProdutoRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ProdutoRepositoryInterface::class,
            EloquentProdutoRepository::class,
        );
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
