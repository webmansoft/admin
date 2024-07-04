<?php

namespace plugin\admin\app\logic\system;

use plugin\admin\basic\BaseLogic;
use plugin\admin\app\model\system\SystemCrontabLog;

/**
 * 定时任务日志逻辑层
 */
class SystemCrontabLogLogic extends BaseLogic
{
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->model = new SystemCrontabLog();
    }
}
