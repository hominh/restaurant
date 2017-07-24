<?php

namespace App\Providers;
use DB;
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

        view()->composer(['fe.pages.home','fe.blocks.header'], function ($view) {
            $view->with('configs',
                DB::table('configs')
                    ->orderBy('id','ASC')
                    ->take(20)
                    ->get()
            );
        });
        view()->composer(['fe.pages.blog','fe.pages.tag','fe.pages.post'], function ($view) {
            $view->with('recentposts',
                DB::table('posts')
                    ->orderBy('id','DESC')
                    ->take(5)
                    ->get()
            );
        });

        view()->composer(['fe.pages.blog','fe.pages.tag','fe.pages.post'], function ($view) {
            $view->with('lastestcomments',
                DB::table('comments')
                    ->orderBy('id','DESC')
                    ->take(10)
                    ->get()
            );
        });

        view()->composer(['fe.pages.blog','fe.pages.tag','fe.pages.post'], function ($view) {
            $view->with('tags',
                DB::table('tags')
                    ->select('tags.id','tags.name','tags.alias')
                    ->orderBy('id','DESC')
                    ->get()
            );
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
