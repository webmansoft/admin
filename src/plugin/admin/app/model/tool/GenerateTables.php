<?php

namespace plugin\admin\app\model\tool;

use plugin\admin\basic\BaseModel;

/**
 * 代码生成业务模型
 * Class GenerateTables
 * @package app\model
 */
class GenerateTables extends BaseModel
{
    /**
     * 数据表主键
     * @var string
     */
    protected $pk = 'id';

    protected $table = 'eb_tool_generate_tables';

    public function getOptionsAttr($value)
    {
        return json_decode($value ?? '', true);
    }
}