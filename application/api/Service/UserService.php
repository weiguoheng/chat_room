<?php
namespace app\api\Service;

use app\api\model\User;

class UserService extends BaseService
{
    public function login($params)
    {
        $params['password'] = md5($params['password']);
        $userInfo = (new User())->getUserInfo($params);
        if($userInfo) {
            return ['code'=>1, 'msg'=>'登录成功', 'data'=>$userInfo['username']];
        } else {
            return ['code'=>-1, 'msg'=>'账号密码错误'];
        }
    }
}