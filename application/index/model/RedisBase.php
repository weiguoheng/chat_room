<?php
namespace app\index\model;

use think\cache\driver\Redis;

class RedisBase{
    protected $redis = null;
    public function __construct()
    {
        $this->redis=new Redis();
//        $this->redis->rPush('k1','a');
//        $res = $this->redis->lRange('k1',0,2);
//        halt($res);
    }
}