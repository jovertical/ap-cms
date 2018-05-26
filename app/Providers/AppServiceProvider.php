<?php

namespace App\Providers;

use App\Acme\Services\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        if (Schema::hasTable('settings')) {
            $settings = app(Setting::class);

            view()->composer('*', function($view) use ($settings) {
                $app = $settings->app();

                $view->with(['app' => $app]);
            });
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Setting::class, function ($app) {
            return new Setting();
        });
    }
}
