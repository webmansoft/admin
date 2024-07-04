<?php

namespace plugin\admin\app\validate\system;

use plugin\admin\basic\BaseValidate;

/**
 * 部门验证器
 */
class SystemDeptValidate extends BaseValidate
{
    /**
     * 定义验证规则
     */
    protected $rule = [
        'name' => 'require|max:16',
        'status' => 'require',
    ];

    /**
     * 定义错误信息
     */
    protected $message = [
        'name.require' => '部门名称必须填写',
        'name.max' => '部门名称最多不能超过16个字符',
        'status' => '状态必须填写',
    ];

    /**
     * 定义场景
     */
    protected $scene = [
        'save' => [
            'name',
            'status',
        ],
        'update' => [
            'name',
            'status',
        ],
    ];
}
