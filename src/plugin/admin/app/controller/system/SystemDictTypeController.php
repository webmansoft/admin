<?php

namespace plugin\admin\app\controller\system;

use support\Request;
use support\Response;
use plugin\admin\basic\BaseController;
use plugin\admin\app\logic\system\SystemDictTypeLogic;
use plugin\admin\app\validate\system\SystemDictTypeValidate;

/**
 * 字典类型控制器
 */
class SystemDictTypeController extends BaseController
{
    /**
     * 构造
     */
    public function __construct()
    {
        $this->logic = new SystemDictTypeLogic();
        $this->validate = new SystemDictTypeValidate;
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
            ['name', ''],
            ['code', ''],
            ['status', ''],
        ]);
        $query = $this->logic->search($where);
        $data = $this->logic->getList($query);
        return $this->success($data);
    }
}
