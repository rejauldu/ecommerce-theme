<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Order;

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
			if (Auth::user() && Auth::user()->role_id == 3) {
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
			if (Auth::user() && Auth::user()->role_id == 2) {
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
			if (Auth::user() && Auth::user()->role_id == 1) {
				$isAuth = 'true';
			}
			
			return "<?php if ($isAuth) { ?>";
		});

		Blade::directive('enduser', function () {
			return "<?php } ?>";
		});
		//Incomplete order counter for theme
		if (\Schema::hasTable('orders')) {
			$countIncomplete = Order::where('order_status_id', 2)->get()->count();
			view()->share('countIncomplete', $countIncomplete);
		}
	}
}
