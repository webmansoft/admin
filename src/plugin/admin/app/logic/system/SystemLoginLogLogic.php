<?php

namespace plugin\admin\app\logic\system;

use plugin\admin\basic\BaseLogic;
use plugin\admin\app\model\system\SystemLoginLog;

/**
 * 登录日志逻辑层
 */
class SystemLoginLogLogic extends BaseLogic
{
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->model = new SystemLoginLog();
    }
}
