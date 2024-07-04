<?php

namespace plugin\admin\app\controller\tool;

use support\Request;
use support\Response;
use plugin\admin\basic\BaseController;
use plugin\admin\app\logic\tool\DataMaintainLogic;

/**
 * 数据表维护控制器
 */
class DataMaintainController extends BaseController
{
    /**
     * 构造
     */
    public function __construct()
    {
        $this->logic = new DataMaintainLogic();
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
            ['source', ''],
        ]);
        $data = $this->logic->getList($where);
        return $this->success($data);
    }

    public function source(): Response
    {
        $data = config('thinkorm.connections');
        $list = [];
        foreach ($data as $k => $v) {
            $list[] = $k;
        }
        return $this->success($list);
    }

    /**
     * 获取表字段信息
     * @param Request $request
     * @return Response
     */
    public function detailed(Request $request): Response
    {
        $table = $request->input('table', '');
        $data = $this->logic->getColumnList($table, '');
        return $this->success($data);
    }

    /**
     * 优化表
     * @param Request $request
     * @return Response
     */
    public function optimize(Request $request): Response
    {
        $tables = $request->input('tables', []);
        $this->logic->optimizeTable($tables);
        return $this->success('优化成功');
    }

    /**
     * 清理表碎片
     */
    public function fragment(Request $request): Response
    {
        $tables = $request->input('tables', []);
        $this->logic->fragmentTable($tables);
        return $this->success('清理成功');
    }
}