<?php

namespace app\index\model;

class UserRedis extends RedisBase
{
    const CHAT_KEY = 'room_members';//redis 中在线人数的key
    /**
     * 获取所有在线人
     * @return false|string
     */
    public function getAllUser()
    {
        return $this->redis->LRange(self::CHAT_KEY, 0, -1);
    }

    /**
     * 新增在线人
     * @param $value
     * @return mixed
     */
    public function addOnlineUser($value)
    {
        return $this->redis->RPush(self::CHAT_KEY, $value);
    }

    /**
     * 判断是否登录
     * @param $username
     * @return bool
     */
    public function isLogin($username)
    {
        $allUser = $this->getAllUser();
        foreach ($allUser as $user) {
            if($username == json_decode($user, true)['client_name']) {
                return true;
            }
        }
        return false;
    }

    public function addUserMsg($data)
    {

    }
}