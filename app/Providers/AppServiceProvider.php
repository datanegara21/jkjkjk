<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
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
    public function boot(Request $request)
    {
        Paginator::useBootstrap();
        if(str_contains($request->getHost(),'ngrok.io')){
            $this->app['request']->server->set('HTTPS', true);
        }

        //format rupiah
        Blade::directive('rupiah', function ($money) {
            return "Rp<?php echo number_format($money, 0, ',', '.'); ?>";
        });
    }
}
