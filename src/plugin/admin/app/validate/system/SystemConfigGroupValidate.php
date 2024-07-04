<?php

namespace plugin\admin\app\validate\system;

use plugin\admin\basic\BaseValidate;

/**
 * 字典类型验证器
 */
class SystemConfigGroupValidate extends BaseValidate
{
    /**
     * 定义验证规则
     */
    protected $rule = [
        'name' => 'require|max:16|chs',
        'code' => 'require|alphaDash',
    ];

    /**
     * 定义错误信息
     */
    protected $message = [
        'name.require' => '组名称必须填写',
        'name.max' => '组名称最多不能超过16个字符',
        'name.chs' => '组名称必须是中文',
        'code.require' => '组标识必须填写',
        'code.alphaDash' => '组标识只能由英文字母组成',
    ];

    /**
     * 定义场景
     */
    protected $scene = [
        'save' => [
            'name',
            'code',
        ],
        'update' => [
            'name',
            'code',
        ],
    ];
}
