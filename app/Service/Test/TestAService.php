<?php
namespace app\Service\Test;
//use Dingo\Api\Facade;

class TestAService
{
    public function __construct(TestBService $b, TestCService $c)
    {
        $this->b = $b;
        echo 'test实例创建成功';

    }

    public function testB()
    {
        //调用 b中的 testb 方法
        $this->b->testb();
    }

    public function testC()
    {
        //调用 c中的 testc 方法
        $this->b->testc();
    }

}
