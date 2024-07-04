<?php

namespace plugin\admin\app\model\system;

use plugin\admin\basic\BaseNormalModel;

/**
 * 字典类型模型
 * Class SystemDict
 * @package app\model
 */
class SystemDictData extends BaseNormalModel
{
    /**
     * 数据表主键
     * @var string
     */
    protected $pk = 'id';

    protected $table = 'eb_system_dict_data';

    /**
     * 关键字搜索
     */
    public function searchKeywordsAttr($query, $value)
    {
        $query->where('label|code', 'LIKE', "%$value%");
    }
}