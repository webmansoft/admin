<?php

namespace plugin\admin\app\logic\system;

use plugin\admin\basic\BaseLogic;
use plugin\admin\app\model\system\SystemConfig;
use plugin\admin\app\model\system\SystemConfigGroup;

/**
 * 参数配置分组逻辑层
 */
class SystemConfigGroupLogic extends BaseLogic
{
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->model = new SystemConfigGroup();
    }

    public function destroy($id)
    {
        $this->model->destroy($id, true);
        SystemConfig::where('group_id', $id)->delete();
    }
}
