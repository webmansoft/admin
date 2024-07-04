<?php

namespace plugin\admin\app\controller\system;

use support\Request;
use support\Response;
use plugin\admin\basic\BaseController;
use plugin\admin\app\logic\system\SystemCrontabLogic;
use plugin\admin\app\logic\system\SystemCrontabLogLogic;
use plugin\admin\app\validate\system\SystemCrontabValidate;

/**
 * 定时任务控制器
 */
class SystemCrontabController extends BaseController
{
    /**
     * 构造
     */
    public function __construct()
    {
        $this->logic = new SystemCrontabLogic();
        $this->validate = new SystemCrontabValidate;
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
            ['type', ''],
            ['status', ''],
            ['create_time', ''],
        ]);
        $query = $this->logic->search($where);
        $data = $this->logic->getList($query);
        return $this->success($data);
    }

    /**
     * 执行定时任务
     * @param Request $request
     * @return Response
     */
    public function run(Request $request): Response
    {
        $id = $request->input('id', '');
        $result = $this->logic->run($id);
        if ($result) {
            return $this->success('执行成功');
        } else {
            return $this->fail('执行失败');
        }
    }

    /**
     * 定时任务日志
     * @param Request $request
     * @return Response
     */
    public function logPageList(Request $request): Response
    {
        $where = $request->more([
            ['crontab_id', ''],
        ]);
        $logic = new SystemCrontabLogLogic();
        $query = $logic->search($where);
        $data = $logic->getList($query);
        return $this->success($data);
    }

    /**
     * 删除定时任务日志数据
     * @param Request $request
     * @return Response
     */
    public function deleteCrontabLog(Request $request): Response
    {
        $ids = $request->input('ids', '');
        if (!empty($ids)) {
            $logic = new SystemCrontabLogLogic();
            $logic->destroy($ids);
            return $this->success('操作成功');
        } else {
            return $this->fail('参数错误，请检查');
        }
    }
}