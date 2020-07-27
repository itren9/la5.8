<?php
/**
 * Autho: man cheng jun
 * Date: 2020/7/27 0027
 * Time: 15:55
 * description：1-2、定义服务类 具体业务逻辑
 */
namespace App\Services;
use App\Contracts\TestContract;

class TestService implements TestContract
{
    public function callMe($controller)
    {
        dd('Call Me From TestServiceProvider In '.$controller);
    }
}
