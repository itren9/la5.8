<?php

namespace App\Providers;

use App\Services\Family\FamilyService;
use App\Services\Family\PersionService;
use App\Services\Family\TvService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

//php artisan make:provider FamilyServiceProvider
//   implements DeferrableProvider 实现服务延迟加载 mcj    https://xueyuanjun.com/post/21457https://xueyuanjun.com/post/21457

class FamilyServiceProvider extends ServiceProvider implements DeferrableProvider
{
    protected $defer = true;//延迟加载
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


        /** 第三种调用bing方法 方式： 传入2个字符串
        * $abstract = 'Illuminate\Contracts\Http\Kernel
         * $concrete => App\Http\Kernel
        * eg:$app->singleton(
        Illuminate\Contracts\Http\Kernel::class,
        App\Http\Kernel::class
        );
         * 实现依赖注入  第二个参数是 类的路径，里面具体的依赖关系 容器帮我们处理
        */
//        $this->app->bind('Family','App\Services\Family\FamilyService');

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

    //延迟加载的调用服务 这样 Family服务 在程序加载的时候 不会启动，只是注册到容器，真正调用的时候才启动服务器
    public function provides()
    {
        return ['Family'];// Family 是别名
    }
}
