<?php

namespace App\Providers;

use App\Services\RandomFact\Repositories\EloquentRandomFactRepository;
use App\Services\RandomFact\Repositories\RandomFactRepositoryInterface;
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

        $this->app->bind(
            RandomFactRepositoryInterface::class,
            EloquentRandomFactRepository::class
        );

    }
}
