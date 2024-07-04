<?php

namespace plugin\admin\app\logic\system;

use plugin\admin\basic\BaseLogic;
use plugin\admin\app\model\system\SystemDictType;
use plugin\admin\app\model\system\SystemDictData;

/**
 * 字典类型逻辑层
 */
class SystemDictTypeLogic extends BaseLogic
{
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->model = new SystemDictType();
    }

    /**
     * 数据更新
     */
    public function update($data, $where)
    {
        $this->model->update($data, $where);
        SystemDictData::update(['code' => $data['code']], ['type_id' => $where['id']]);
        return true;
    }

    /**
     * 数据删除
     */
    public function destroy($ids, $force = false)
    {
        $result = $this->model->destroy($ids, $force);
        if ($force) {
            // 真实删除，删除字典数据
            SystemDictData::where('type_id', 'in', $ids)->delete();
        }
        return $result;
    }
}
