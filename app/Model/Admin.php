<?php
//后台登录表
namespace App\Model;

use Illuminate\Foundation\Auth\User;

class Admin extends User
{
    protected $rememberTokenName = '';
}
