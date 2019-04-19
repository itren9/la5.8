<?php
//标签
//php artisan make:controller Admin/TagController


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class TagController extends CommonController
{
    //
    public function store(TagRequest $request, Tag $model)
    {
        $model->create($request->all());

        return redirect('/admin/tag');
    }
}
