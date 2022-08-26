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
use Hyperf\Di\Annotation\Inject;
use HyperfExt\Jwt\JwtFactory;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class JwtMiddleware implements MiddlewareInterface
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * 注入 JwtFactory.
     * @Inject
     * @var JwtFactory
     */
    private $jwtFactory;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $jwt = $this->jwtFactory->make();

        try {
            $jwt->checkOrFail();
        } catch (\Exception $exception) {
            throw new BusinessException('token验证失败', 401);
        }

        return $handler->handle($request);
    }
}
