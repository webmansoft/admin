<?php

namespace plugin\admin\app\logic\system;

use plugin\admin\basic\BaseLogic;
use plugin\admin\app\model\system\SystemOperLog;

/**
 * 操作日志逻辑层
 */
class SystemOperLogLogic extends BaseLogic
{
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->model = new SystemOperLog();
    }
}
