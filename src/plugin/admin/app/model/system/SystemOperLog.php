<?php

namespace plugin\admin\app\model\system;

use plugin\admin\basic\BaseModel;

/**
 * 操作日志模型
 * Class SystemOperLog
 * @package app\model
 */
class SystemOperLog extends BaseModel
{
    /**
     * 数据表主键
     * @var string
     */
    protected $pk = 'id';

    protected $table = 'eb_system_oper_log';
}