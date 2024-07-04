<?php

namespace plugin\admin\app\validate\system;

use plugin\admin\basic\BaseValidate;

/**
 * 用户角色验证器
 */
class SystemPostValidate extends BaseValidate
{
    /**
     * 定义验证规则
     */
    protected $rule = [
        'name' => 'require|max:16',
        'code' => 'require|alpha',
        'status' => 'require',
    ];

    /**
     * 定义错误信息
     */
    protected $message = [
        'name.require' => '岗位名称必须填写',
        'name.max' => '岗位名称最多不能超过16个字符',
        'code.require' => '岗位标识必须填写',
        'code.alpha' => '岗位标识只能由英文字母组成',
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
