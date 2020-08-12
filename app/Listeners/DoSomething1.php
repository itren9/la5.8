<?php

namespace App\Listeners;

use App\Events\UserLogin;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
//implements ShouldQueue 队列异步处理
class DoSomething1 implements ShouldQueue
{
    /**
     * mcj 任务应该发送到的队列的  连接的名称
     *
     * @var string|null
     */
    public $connection = 'redis';

    /**
     * mcj 任务应该发送到的队列的  名称
     *
     * @var string|null
     */
    public $queue = 'listeners';

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserLogin  $event
     * @return void
     * 监听到事件后的操作
     */
    public function handle(UserLogin $event)
    {
        //
        info('do something1');
    }
}
