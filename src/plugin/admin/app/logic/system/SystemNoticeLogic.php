<?php

namespace plugin\admin\app\logic\system;

use plugin\admin\basic\BaseLogic;
use plugin\admin\app\model\system\SystemNotice;

/**
 * 系统公告逻辑层
 */
class SystemNoticeLogic extends BaseLogic
{
    /**
     * @var bool 数据边界启用状态
     */
    protected $scope = true;

    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->model = new SystemNotice();
    }
}
