<?php

namespace Illuminate\Events;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Queue\Factory as QueueFactoryContract;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     * 第一种调用bing方法的方式
     * @return void
     */
    public function register()
    {
        //singleton 方法和bind 方法一样，只不过用的不是单例
        $this->app->singleton('events', function ($app) {
            return (new Dispatcher($app))->setQueueResolver(function () use ($app) {
                return $app->make(QueueFactoryContract::class);
            });
        });
    }
}
