<?php

namespace App\Http\Controllers\Test;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//use App\Contracts\Test\TestContract;

class TestController extends Controller
{
    //依赖注入
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
        // $test = App::make('test');
        // $test->callMe('TestController');
        $this->test->callMe('TestController');
    }

...//其他控制器动作
}
