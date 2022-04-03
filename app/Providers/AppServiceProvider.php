<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;


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
        Blade::directive('admin', function () {
            $isAdmin = false;

            // check if the user authenticated is teacher
            if (request('admin')) {

                $isAdmin = true;
            }

            return "<?php if($isAdmin){ ?>";
        });

        Blade::directive('endadmin', function () {
            return "<?php } ?>";
        });

        Blade::directive('fuck', function () {
            return "fuuuuuuuck";
        });
    }
}
