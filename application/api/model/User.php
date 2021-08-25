<?php

namespace app\api\model;

use think\Model;

class User extends Model
{
    /**
     * 根据用户名密码获取用户信息
     * @param $params
     * @return mixed
     */
    public function getUserInfo($params)
    {
        return $this
            ->where(['username'=>$params['username'],'password'=>$params['password']])
            ->find();
    }
}
