<?php

namespace plugin\admin\app\model\system;

use plugin\admin\basic\BaseModel;

/**
 * 定时任务日志模型
 * Class SystemCrontabLog
 * @package app\model
 */
class SystemCrontabLog extends BaseModel
{
    /**
     * 数据表主键
     * @var string
     */
    protected $pk = 'id';

    protected $table = 'eb_system_crontab_log';
}