<?php
namespace app\service;

use app\index\model\UserRedis;
use think\worker\Server;
use Workerman\Lib\Timer;

class Worker extends Server
{
    public function onMessage($connection,$data)
    {
        file_put_contents('message.csv', $data);
        $data = json_decode($data, true);
        if(isset($data['type'])) {
            if($data['type'] == 'login') {
                $data['respond_time'] = time();
                $userRedis = (new UserRedis());
                // 判断是否登录
                $isLogin = $userRedis->isLogin($data['client_name']);
                if(!$isLogin) {
                    $data['time'] = date('Y-m-d H:i:s');
                    $userRedis->addOnlineUser(json_encode($data));
                }
            } elseif($data['type'] == 'pong') {
                return;
            } elseif($data['type'] == 'say') {
                $connection->lastMessageTime = time();
                $data['respond_time'] = date('Y-m-d H:i:s');
            } elseif($data['type'] == 'close') {
                $data['respond_time'] = date('Y-m-d H:i:s');
            }
        }
        $connection->send(json_encode($data));
    }

    public function onWorkerStart($worker)
    {
        Timer::add(50, function()use($worker){
            $time_now = time();
            foreach($worker->connections as $connection) {
                $connection->send(json_encode(['type'=>'ping']));
                // 有可能该connection还没收到过消息，则lastMessageTime设置为当前时间
                if (empty($connection->lastMessageTime)) {
                    $connection->lastMessageTime = $time_now;
                    continue;
                }
                // 上次通讯时间间隔大于心跳间隔，则认为客户端已经下线，关闭连接
                if ($time_now - $connection->lastMessageTime > 50) {
                    $connection->close();
                }
            }
        });
    }
}