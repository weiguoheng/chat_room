<?php

namespace app\command;

use think\console\Command;
use think\console\Input;
use think\console\Output;

class TestCommand extends Command
{
    protected function configure()
    {
        // 指令配置
        $this->setName('testcommand');
        // 设置参数
        
    }

    protected function execute(Input $input, Output $output)
    {
        $where = ['id'=>1,'username'=>'weiguoheng2'];
        $new_where = [];
        foreach ($where as $key=>$value) {
            $new_where[] = [$key, '=', $value];
        }
        $user_id = 1;
        $where1 = array_merge($new_where,[['username','=','weiguoheng1']]);
        $where2 = array_merge($new_where,[['id','=',1]]);
        $data = Db('user')
            ->whereOr($where1, $where2)
            ->select();
        halt($data);
    }
}
