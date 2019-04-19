<?php
/**
 * 我的信息 修改密码
 */

namespace App\Http\Controllers\Admin;
use App\Http\Requests\AdminMyController;
use Auth;
class MyController extends CommonController
{
    //修改密码 视图
    public function passwordForm()
    {
        return view('admin.my.passwordForm');
    }

    //修改密码
    public function changePassword(AdminMyController $request)
    {
        $model           = Auth::guard('admin')->user();
        $model->password = bcrypt($request['password']);
        $model->save();
        flash('密码修改成功')->overlay();
        return redirect()->back();
    }
}
