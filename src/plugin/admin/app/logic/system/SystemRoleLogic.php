<?php

namespace plugin\admin\app\logic\system;

use think\db\Query;
use plugin\admin\basic\BaseLogic;
use plugin\admin\app\model\system\SystemRole;

/**
 * 角色逻辑层
 */
class SystemRoleLogic extends BaseLogic
{
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->model = new SystemRole();
    }

    public function getMenuIdsByRoleIds($ids) : array
    {
        if (empty($ids)) return [];
        return $this->model->where('id', 'in', $ids)->with(['menus' => function(Query $query) {
            $query->where('status', 1)->order('sort', 'desc');
        }])->select()->toArray();

    }

    public function getMenuByRole($id): array
    {
        $role = $this->model->find($id);
        $menus = $role->menus ?: [];
        return [
            'id' => $id,
            'menus' => $menus
        ];
    }

    public function saveMenuPermission($id, $menu_ids)
    {
        $role = $this->model->find($id);
        if ($role) {
            $role->menus()->detach();
            $role->menus()->saveAll($menu_ids);
        }
        return $role;
    }

    public function getDeptByRole($id) : array
    {
        $role = $this->model->find($id);
        $depts = $role->depts?: [];
        return [
            'id' => $id,
            'depts' => $depts
        ];
    }

    public function saveDeptPermission($id, $data)
    {
        $role = $this->model->find($id);
        $role->data_scope = $data['data_scope'];
        $role->save();
        if ($role) {
            $role->depts()->detach();
            $role->depts()->saveAll($data['dept_ids']);
        }
        return $role;
    }
}
