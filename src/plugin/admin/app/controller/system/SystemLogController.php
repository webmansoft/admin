<?php

namespace plugin\admin\app\controller\system;

use support\Request;
use support\Response;
use plugin\admin\basic\BaseController;
use plugin\admin\app\logic\system\SystemOperLogLogic;
use plugin\admin\app\logic\system\SystemLoginLogLogic;

/**
 * 日志控制器
 */
class SystemLogController extends BaseController
{

    /**
     * 登录日志列表
     * @param Request $request
     * @return Response
     */
    public function getLoginLogPageList(Request $request): Response
    {
        $where = $request->more([
            ['login_time', ''],
            ['username', ''],
            ['status', ''],
            ['ip', ''],
        ]);
        $logic = new SystemLoginLogLogic();
        $query = $logic->search($where);
        $data = $logic->getList($query);
        return $this->success($data);
    }

    /**
     * 删除登录日志
     * @param Request $request
     * @return Response
     */
    public function deleteLoginLog(Request $request): Response
    {
        $ids = $request->input('ids', '');
        $logic = new SystemLoginLogLogic();
        if (!empty($ids)) {
            $logic->destroy($ids);
            return $this->success('删除成功');
        } else {
            return $this->fail('参数错误，请检查');
        }
    }

    /**
     * 操作日志列表
     * @param Request $request
     * @return Response
     */
    public function getOperLogPageList(Request $request): Response
    {
        $where = $request->more([
            ['create_time', ''],
            ['username', ''],
            ['service_name', ''],
            ['ip', ''],
        ]);
        $logic = new SystemOperLogLogic();
        $query = $logic->search($where);
        $data = $logic->getList($query);
        return $this->success($data);
    }

    /**
     * 删除操作日志
     * @param Request $request
     * @return Response
     */
    public function deleteOperLog(Request $request): Response
    {
        $ids = $request->input('ids', '');
        $logic = new SystemOperLogLogic();
        if (!empty($ids)) {
            $logic->destroy($ids);
            return $this->success('删除成功');
        } else {
            return $this->fail('参数错误，请检查');
        }
    }
}
