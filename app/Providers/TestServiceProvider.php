<?php
/**
 * Autho: man cheng jun
 * Date: 2020/7/27 0027
 * Time: 16:50
 * description:2、创建服务提供者
 */

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\TestService;

class TestServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     * @author LaravelAcademy.org
     */
    public function register()
    {
        //方式一：使用singleton绑定单例
        $this->app->singleton('test', function () {
            return new TestService();
        });

        //方式二：使用bind绑定实例到接口以便依赖注入
        $this->app->bind('App\Contracts\TestContract', function () {
            return new TestService();
        });
    }
}
