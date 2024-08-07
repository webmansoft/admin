<?php

namespace plugin\admin\app\controller\system;

use support\Request;
use support\Response;
use plugin\admin\basic\BaseController;
use plugin\admin\app\logic\system\SystemRoleLogic;
use plugin\admin\app\validate\system\SystemRoleValidate;

/**
 * 角色控制器
 */
class SystemRoleController extends BaseController
{
    /**
     * 构造
     */
    public function __construct()
    {
        $this->logic = new SystemRoleLogic();
        $this->validate = new SystemRoleValidate;
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
        $saiType = $request->input('saiType', '');
        if ($saiType === 'all') {
            $query->where('id', '>', 1);
        }
        $query->order('sort', 'desc');
        $data = $this->logic->getList($query);
        return $this->success($data);
    }

    /**
     * 菜单权限
     * @param Request $request
     * @param $id
     * @return Response
     */
    public function menuPermission(Request $request, $id): Response
    {
        $menu_ids = $request->post('menu_ids');
        $this->logic->saveMenuPermission($id, $menu_ids);
        return $this->success('操作成功');
    }

    /**
     * 数据权限
     * @param Request $request
     * @param $id
     * @return Response
     */
    public function dataPermission(Request $request, $id): Response
    {
        $data = $request->post();
        $this->logic->saveDeptPermission($id, $data);
        return $this->success('操作成功');
    }

    /**
     * 根据角色获取菜单
     * @param Request $request
     * @param $id
     * @return Response
     */
    public function getMenuByRole(Request $request, $id): Response
    {
        $data = $this->logic->getMenuByRole($id);
        return $this->success($data);
    }

    /**
     * 根据角色获取部门
     * @param Request $request
     * @param $id
     * @return Response
     */
    public function getDeptByRole(Request $request, $id): Response
    {
        $data = $this->logic->getDeptByRole($id);
        return $this->success($data);
    }
}
