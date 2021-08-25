<?php

namespace app\index\controller;

use think\Controller;
use think\Request;

class User extends Controller
{
    /**
     * 用户登录
     *
     * @return \think\Response
     */
    public function chat()
    {
        return $this->fetch();
    }
}
