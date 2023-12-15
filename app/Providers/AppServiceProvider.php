<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Carbon::setLocale('ru_RU');
        Paginator::useBootstrap();
        Blade::directive('admin', function () {
            $isAdmin = false;

            // check if the user authenticated is teacher
            if (auth()->user() && auth()->user()->role == 0) {

                $isAdmin = true;
            }

            return "<?php if ($isAdmin) { ?>";
        });

        Blade::directive('endauthor', function () {
            return "<?php } ?>";
        });

    }
}
