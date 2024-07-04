<?php

namespace plugin\admin\app\controller\system;

use support\Request;
use support\Response;
use plugin\admin\utils\Cache;
use plugin\admin\basic\BaseController;
use plugin\admin\app\logic\system\SystemConfigLogic;
use plugin\admin\app\logic\system\SystemConfigGroupLogic;
use plugin\admin\app\validate\system\SystemConfigValidate;

/**
 * 配置项数据控制器
 */
class SystemConfigController extends BaseController
{
    /**
     * 构造
     */
    public function __construct()
    {
        $this->logic = new SystemConfigLogic();
        $this->validate = new SystemConfigValidate;
        parent::__construct();
    }

    /**
     * 数据列表
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        $where = $request->more([
            ['group_id', ''],
            ['name', ''],
            ['key', ''],
        ]);
        $query = $this->logic->search($where);
        $data = $this->logic->getAll($query);
        return $this->success($data);
    }

    /**
     * 根据key值修改配置项
     * @param Request $request
     * @return Response
     */
    public function updateByKeys(Request $request): Response
    {
        $data = $request->post();
        foreach ($data as $key => $value) {
            $group = $key;
            $this->logic->where('key', $key)
                ->update(['value' => is_array($value) ? json_encode($value, JSON_UNESCAPED_UNICODE) : $value]);
            Cache::clear('config_' . $key);
        }
        if ($group != '') {
            $model = $this->logic->where('key', $group)->findOrEmpty();
            $groupLogic = new SystemConfigGroupLogic();
            $groupModel = $groupLogic->where('id', $model->group_id)->findOrEmpty();
            if (!$groupModel->isEmpty()) {
                Cache::clear('cfg_' . $groupModel->code);
            }
        }

        return $this->success('操作成功');
    }
}
