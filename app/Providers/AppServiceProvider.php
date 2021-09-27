<?php

namespace App\Providers;

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
        if (app()->isLocal()) {
            $this->app->register(\VIACreative\SudoSu\ServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
	{
		\App\Models\User::observe(\App\Observers\UserObserver::class);
		\App\Models\Reply::observe(\App\Observers\ReplyObserver::class);

        Schema::defaultStringLength(191);


        \App\Models\Topic::observe(\App\Observers\TopicObserver::class); //观察器需要注册

        \App\Models\Link::observe(\App\Observers\LinkObserver::class);

        \Illuminate\Pagination\Paginator::useBootstrap();
    }
}
