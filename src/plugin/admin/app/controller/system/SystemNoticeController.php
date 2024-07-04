<?php

namespace plugin\admin\app\controller\system;

use support\Request;
use support\Response;
use plugin\admin\basic\BaseController;
use plugin\admin\app\logic\system\SystemNoticeLogic;
use plugin\admin\app\validate\system\SystemNoticeValidate;

/**
 * 系统公告控制器
 */
class SystemNoticeController extends BaseController
{
    /**
     * 构造
     */
    public function __construct()
    {
        $this->logic = new SystemNoticeLogic();
        $this->validate = new SystemNoticeValidate;
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
            ['title', ''],
            ['type', ''],
            ['create_time', ''],
        ]);
        $query = $this->logic->search($where);
        $data = $this->logic->getList($query);
        return $this->success($data);
    }
}
