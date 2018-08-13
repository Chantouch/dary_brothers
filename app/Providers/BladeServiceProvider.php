<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('admin', function () {
            return Auth::check() && Auth::user()->isAdmin();
        });
        Blade::if('profile', function ($user) {
            return Auth::check() && Auth::user()->id == $user->id;
        });
        Blade::directive('active_class', function ($expression) {
            return '<?php echo active_class(' . $expression . '); ?>';
        });
        Blade::directive('class', function ($expression) {
            return '<?php echo html_class' . $expression . '; ?>';
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
