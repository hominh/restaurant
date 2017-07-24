<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            $view->with('recentposts',
                DB::table('posts')
                    ->where('id','<>',$idPost)
                    ->orderBy('id','DESC')
                    ->take(5)
                    ->get();
            );
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
