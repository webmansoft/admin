<?php

namespace plugin\admin\app\validate\system;

use plugin\admin\basic\BaseValidate;

/**
 * 菜单验证器
 */
class SystemMenuValidate extends BaseValidate
{
    /**
     * 定义验证规则
     */
    protected $rule = [
        'name' => 'require|max:16',
        'code' => 'require',
        'status' => 'require',
    ];

    /**
     * 定义错误信息
     */
    protected $message = [
        'name.require' => '菜单名称必须填写',
        'name.max' => '菜单名称最多不能超过16个字符',
        'code' => '菜单标识必须填写',
        'status' => '状态必须填写',
    ];

    /**
     * 定义场景
     */
    protected $scene = [
        'save' => [
            'name',
            'code',
            'status',
        ],
        'update' => [
            'name',
            'code',
            'status',
        ],
    ];
}
