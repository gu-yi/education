<?php

namespace App\Admin;

//引入框架自身已经实现的代码
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use Authenticatable;
    //定义模型关联数据表明
    protected $table = 'admin';
}
