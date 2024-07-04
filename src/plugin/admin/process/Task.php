<?php

namespace plugin\admin\process;

use Workerman\Crontab\Crontab;
use plugin\admin\app\logic\system\SystemCrontabLogic;

class Task
{
    public function onWorkerStart()
    {

        $logic = new SystemCrontabLogic();
        $taskList = $logic->where('status', 1)->select();

        foreach ($taskList as $item) {
            new Crontab($item->rule, function () use ($logic, $item) {
                $logic->run($item->id);
            });
        }
    }

    public function run($args)
    {
        echo '任务调用：'.date('Y-m-d H:i:s')."\n";
        var_dump('参数:'. $args);
        return '任务调用：'.date('Y-m-d H:i:s')."\n";
    }
}