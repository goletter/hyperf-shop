<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
use Hyperf\Utils\ApplicationContext;
use Hyperf\Utils\Arr;
use HyperfExt\Auth\Contracts\AuthManagerInterface;
use Psr\Http\Message\ServerRequestInterface;

/*
 * 容器实例
 */
if (! function_exists('container')) {
    function container()
    {
        return ApplicationContext::getContainer();
    }
}

/*
 * 请求
 */
if (! function_exists('request')) {
    function request()
    {
        return container()->get(ServerRequestInterface::class);
    }
}

/*
 * Auth认证辅助方法
 * @param string|null $guard
 */
if (! function_exists('auth')) {
    function auth(string $guard = null)
    {
        if (is_null($guard)) {
            $guard = config('auth.default.guard');
        }
        return make(AuthManagerInterface::class)->guard($guard);
    }
}

if (! function_exists('parse_includes')) {
    function parse_includes($includes = null)
    {
        if (is_null($includes)) {
            $includes = Arr::get(request()->getQueryParams(), 'include', '');
        }

        if (! is_array($includes)) {
            $includes = array_filter(explode(',', $includes));
        }

        $parsed = [];
        foreach ($includes as $include) {
            $nested = explode('.', $include);

            $part = array_shift($nested);
            $parsed[] = $part;

            while (count($nested) > 0) {
                $part .= '.' . array_shift($nested);
                $parsed[] = $part;
            }
        }

        return array_values(array_unique($parsed));
    }
}
