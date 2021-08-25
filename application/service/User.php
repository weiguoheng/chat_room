<?php
namespace app\service;

use app\index\model\UserRedis;

class User
{
    /**
     * 获取所有用户
     * @return false|string
     */
    public function getAllUser()
    {
        $allUser = (new UserRedis())->getAllUser();
        foreach ($allUser as &$userItem) {
            $userItem = json_decode($userItem, true);
        }
        return $allUser;
    }

    public function addChatMsg($data)
    {

    }
}