<?php
namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::preventLazyLoading();
        View::composer('HomePage.Navbar', function ($view) {
            $count = 0;

            if (Auth::check()) {
                $count = Auth::user()->keranjangs->count();
            }

            $view->with('count', $count);
        });
    }
}
