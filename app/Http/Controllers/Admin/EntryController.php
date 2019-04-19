<?php
//后台登录
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;//认证服务
use Illuminate\Support\Facades\Hash;//加密
class EntryController extends Controller
{
    //加载 中间件 排除(except)不必要 的控制
    public function __construct()
    {
       // $this->middleware('admin.auth')->except(['loginForm', 'login']);

    }
    //后台首页
    public function  index(){

        return view('admin.entry.index');

    }
    //加密
    public function pwd(){
        return  Hash::make(123);
    }
    //登录界面
    public function loginForm(){

        return view('admin.entry.login');
    }
    //登录处理  手动认证 https://learnku.com/docs/laravel/5.7/authentication/2269
/*    public function login(Request $request){

        $credentials = $request->only('username', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            // Authentication passed...
           // echo 11;exit;
            return redirect('admin/index');
          //  return redirect()->intended('admin/index');
            //intended 方法将经由身份验证中间件将用户重定向到身份验证前截获的 URL 。如果预期目标不存在，可以为此方法指定一个回退 URI
        }
        else{
           // echo 00;exit;
            return redirect('/admin/login')->with('error','用户名或密码错误');
        }

    }*/
    public function login(Request $request)
    {
        $status = Auth::guard('admin')->attempt([
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ]);
        if ($status) {
            //登录成功
            return redirect('/admin/index');
        }

        return redirect('/admin/login')->with('error', '用户名或密码错误');
    }
    //退出
    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect('/admin/login');
    }

}
