<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        Schema::defaultStringLength(191);
		Blade::directive('admin', function () {
			$isAuth = 'false';
			// check if the user authenticated is teacher
			if (Auth::user() && Auth::user()->role== 2) {
				$isAuth = 'true';
			}
			
			return "<?php if ($isAuth) { ?>";
		});

		Blade::directive('endadmin', function () {
			return "<?php } ?>";
		});
		Blade::directive('moderator', function () {
			$isAuth = 'false';
			// check if the user authenticated is teacher
			if (Auth::user() && Auth::user()->role== 1) {
				$isAuth = 'true';
			}
			
			return "<?php if ($isAuth) { ?>";
		});

		Blade::directive('endmoderator', function () {
			return "<?php } ?>";
		});
		Blade::directive('user', function () {
			$isAuth = 'false';
			// check if the user authenticated is teacher
			if (Auth::user() && Auth::user()->role== 0) {
				$isAuth = 'true';
			}
			
			return "<?php if ($isAuth) { ?>";
		});

		Blade::directive('enduser', function () {
			return "<?php } ?>";
		});
    }
}
