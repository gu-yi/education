<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //管理员列表页
    public function index()
    {
        return view('admin.admin.index');
    }

    //获取ajax请求数据
    public function loadData()
    {
        $data = Admin::get();
        return [
            'data'=>$data,
        ];
    }
}
