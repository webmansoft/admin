<?php

namespace plugin\admin\exception;

use Throwable;

/**
 * 自定义异常类
 * @package plugin\admin\app\exception
 */
class ApiException extends \RuntimeException
{
    public function __construct($message, $code = 400, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}