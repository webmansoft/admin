<?php

namespace plugin\admin\app\model\system;

use plugin\admin\basic\BaseModel;

/**
 * 岗位模型
 * Class SystemRole
 * @package app\model
 */
class SystemPost extends BaseModel
{
    /**
     * 数据表主键
     * @var string
     */
    protected $pk = 'id';

    protected $table = 'eb_system_post';
}