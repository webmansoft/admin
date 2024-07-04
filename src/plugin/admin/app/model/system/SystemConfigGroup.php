<?php

use plugin\admin\basic\BaseModel;

/**
 * 参数配置分组模型
 * Class SystemConfigGroup
 * @package app\model
 */
class SystemConfigGroup extends BaseModel
{
    /**
     * 数据表主键
     * @var string
     */
    protected $pk = 'id';

    protected $table = 'eb_system_config_group';

    public function configs()
    {
        return $this->hasMany(SystemConfig::class, 'group_id', 'id');
    }
}