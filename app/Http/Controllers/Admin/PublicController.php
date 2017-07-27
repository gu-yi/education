<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class PublicController extends Controller
{
    //登录页面展示
   public function login(){
    return view('admin.public.login');
   }
    //登录处理
        public function checkLogin(Request $request){
       //字段有效性验证
            $this -> validate($request,[
                'username' => 'required|min:3|max:20',
                'password' => 'required|min:3|max:20',
                'captcha' => 'required|captcha',
            ]);
            $data = $request->only('username','password');//获取用户密码数组格式

            //验证
            $res = Auth::guard('admin') -> attempt($data,$request -> get('online'));
            //$res = Auth::guard('admin') -> attempt($data,$request->get('online'));
            //判断验证
            if ($res){
                return redirect('/admin/public/index');
            }else{
                return redirect('/admin/public/login')->withErrors([
                    'loginError'=>'用户名密码错误',
                ]);
            }
    }
    //后台首页展示
    public function index()
    {
       return view('admin.public.index') ;
    }
    //后台welcome展示
    public function welcome()
    {
        return view('admin.public.welcome') ;
    }
    //退出登录
    public function logout()
    {
       Auth::guard('admin')->logout();

       return redirect('/admin/public/login');
    }
}
