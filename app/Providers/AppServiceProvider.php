<?php

namespace App\Providers;

use App\Services\Superstition\Repositories\EloquentSuperstitionRepository;
use App\Services\Superstition\Repositories\SuperstitionRepositoryInterface;
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
        $this->registerBindings();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (config('app.env') === 'stage') {
            \URL::forceScheme('https');
        }
    }

    private function registerBindings()
    {
        $this->app->bind(
            SuperstitionRepositoryInterface::class,
            EloquentSuperstitionRepository::class
        );

    }
}
