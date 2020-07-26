<?php
//标签
//php artisan make:controller Admin/TagController


namespace App\Http\Controllers\Admin;

use App\Http\Requests\TagRequest;
use App\Model\Tag;
class TagController extends CommonController
{
    //添加页面
    public function create()
    {
        return view('admin.tag.create');
    }

    //添加逻辑
    public function store(TagRequest $request, Tag $model)
    {
        $model->create($request->all());

        return redirect('/admin/tag');
    }
    //修改页面
    public function edit($id)
    {
        $model = Tag::find($id);
       // dd($model);
        return view('admin.tag.edit',compact('model'));

    }

    //修改逻辑
    public function update(TagRequest $request, $id)
    {
        $model = Tag::find($id);
        $model->name = $request['name'];//属性赋值
        $model->save();
        return redirect('/admin/tag');
    }
    //列表展示 所有
    public function index()
    {
        $data = Tag::get();

        return view('admin.tag.index', compact('data'));
    }
    //删除
    public function destroy($id){
        Tag::destroy($id);
        return $this->success('删除成功');
    }
}
