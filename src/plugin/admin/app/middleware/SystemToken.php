<?php

namespace plugin\admin\app\middleware;

use Webman\Event\Event;
use Webman\Http\Request;
use Webman\Http\Response;
use Webman\MiddlewareInterface;
use plugin\admin\exception\ApiException;

class SystemToken implements MiddlewareInterface
{
    /**
     * @param Request $request
     * @param callable $handler
     * @return Response
     */
    public function process(Request $request, callable $handler): Response
    {
        try {
            $rule = trim(strtolower($request->path()));
            $whiteList = config('plugin.admin.project.white_list', []);

            if (in_array($rule, $whiteList)) {
                // 记录日志
                return $handler($request);
            }
            // 记录日志
            Event::emit('user.operateLog', true);
            return $handler($request);
        } catch (\Exception $e) {
            throw new ApiException('您的登录凭证错误或者已过期，请重新登录', 401);
        }
    }
}