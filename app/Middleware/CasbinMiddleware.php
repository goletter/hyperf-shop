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
namespace App\Middleware;

use App\Exception\BusinessException;
use Donjan\Casbin\Enforcer;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class CasbinMiddleware implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $user = auth('api')->user();
        // $path = $request->getUri()->getPath();
        $server = $request->getServerParams();
        $path = strtolower($server['path_info']);
        $method = strtoupper($server['request_method']);
        if ($user->id === config('super_admin') || Enforcer::enforce($user->name, $path, $method)) {
            return $handler->handle($request);
        }

        throw new BusinessException('无权进行该操作', 403);
    }
}
