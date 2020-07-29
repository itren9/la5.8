<?php

namespace App\Providers;

use App\Services\Family\FamilyService;
use App\Services\Family\PersionService;
use App\Services\Family\TvService;
use Illuminate\Support\ServiceProvider;

//php artisan make:provider FamilyServiceProvider

class FamilyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     * des:将可 被调用的对象 注册到容器中
     * @return void
     */
    public function register()
    {
        /** 第一种调用bing方法 方式：传入字符串 events
         * $abstract = events 字符串
         * $concrete = 匿名函数
         * $shared = true
         * eg: $this->app->singleton('events', function ($app) {}
         * 直接实例 自己解决依赖关系，好处是 可以 个性处理 设置属性，坏处 没用到依赖注入 稍微麻烦
         */
        $this->app->bind('Family',function(){
            return new FamilyService(new PersionService(),new TvService());
        });


        /** 第二种调用ing方法 方式： 传入2个字符串
        * $abstract = 'Illuminate\Contracts\Http\Kernel
         * $concrete => App\Http\Kernel
        * eg:$app->singleton(
        Illuminate\Contracts\Http\Kernel::class,
        App\Http\Kernel::class
        );
         * 实现依赖注入  第二个参数是 类的路径，里面具体的依赖关系 容器帮我们处理
        */
        $this->app->bind('Family','App\Services\Family\FamilyService');

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
