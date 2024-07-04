<?php

namespace plugin\admin\app\model\system;

use plugin\admin\basic\BaseModel;

/**
 * 系统公告模型
 */
class SystemNotice extends BaseModel
{
    // 完整数据库表名称
    protected $table = 'eb_system_notice';
    // 主键
    protected $pk = 'id';
}