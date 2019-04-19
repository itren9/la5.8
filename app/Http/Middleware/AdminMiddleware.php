<?php
//后台中加件
// php artisan make:middleware AdminMiddleware

namespace App\Http\Middleware;

use Closure;
use Auth;
class AdminMiddleware
{
    /**
     * mcj 后台中间件 创建
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //判断是否登录
        if (Auth::guard('admin')->check()){
            return redirect('/admin/login');
        }
        return $next($request);
    }
}
