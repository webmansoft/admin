<?php

namespace plugin\admin\app\model\system;

use plugin\admin\basic\BaseModel;

/**
 * 部门模型
 * Class SystemDept
 * @package app\model
 */
class SystemDept extends BaseModel
{
    /**
     * 数据表主键
     * @var string
     */
    protected $pk = 'id';

    protected $table = 'eb_system_dept';

    public function leader()
    {
        return $this->belongsToMany(SystemUser::class, SystemDeptLeader::class, 'user_id', 'dept_id');
    }
}