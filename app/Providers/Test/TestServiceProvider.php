<?php

namespace App\Providers\Test;

use Illuminate\Support\ServiceProvider;
//php artisan make:provider Test\TestServiceProvider
//use App\Services\Test\TestService;

class TestServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //1、使用singleton绑定单例
        $this->app->singleton('test',function(){
            return new TestService();
        });

        //2、使用bind绑定实例到接口以便依赖注入
        $this->app->bind('App\Contracts\TestContract',function(){
            return new TestService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
