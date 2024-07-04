<?php

namespace plugin\admin\app\logic\system;

use plugin\admin\utils\Cache;
use plugin\admin\basic\BaseLogic;
use plugin\admin\exception\ApiException;
use plugin\admin\app\model\system\SystemConfig;
use plugin\admin\app\model\system\SystemConfigGroup;

/**
 * 参数配置逻辑层
 */
class SystemConfigLogic extends BaseLogic
{
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->model = new SystemConfig();
    }

    /**
     * 获取单项配置
     */
    public function getConfig($config)
    {
        $prefix = 'config_';
        $data = Cache::get($prefix . $config);
        if ($data) {
            return $data;
        }
        $info = $this->model->where('key', $config)->findOrEmpty();
        if ($info->isEmpty()) {
            throw new ApiException('配置项不存在');
        }
        Cache::set($prefix . $config, $info->toArray());
        return $info;
    }

    /**
     * 获取配置组
     */
    public function getGroup($config)
    {
        $prefix = 'cfg_';
        $data = Cache::get($prefix . $config);
        if ($data) {
            return $data;
        }
        $group = SystemConfigGroup::where('code', $config)->findOrEmpty();
        if ($group->isEmpty()) {
            throw new ApiException('配置组不存在');
        }
        $info = $this->model->where('group_id', $group->id)->select();
        Cache::set($prefix . $config, $info->toArray());
        return $info;
    }
}
