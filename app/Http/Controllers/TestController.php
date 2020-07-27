<?php
/**
 * 命令 php artisan make:controller TestController
   desc:4、测试服务提供者
 *
 */
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use App\Contracts\TestContract;
class TestController extends Controller
{
    //依赖注入 test 服务接口
    public function __construct(TestContract $test){
        $this->test = $test;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     * @author LaravelAcademy.org
     */
    public function index()
    {
        //方式 一
         $test = App::make('test');
         $test->callMe('TestController');

         //方式 二 依赖注入 解析绑定类 调用callMe方法
        // $this->test->callMe('TestController');
    }


}
