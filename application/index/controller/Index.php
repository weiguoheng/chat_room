<?php
namespace app\index\controller;

use think\Controller;
use app\service\User;

class Index extends Controller
{
    public function index()
    {
        $allUser = (new User())->getAllUser();
        $this->assign('list', $allUser);
        return $this->fetch();
    }
}
