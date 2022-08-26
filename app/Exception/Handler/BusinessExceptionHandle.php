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
namespace App\Exception\Handler;

use App\Exception\BusinessException;
use Hyperf\ExceptionHandler\ExceptionHandler;
use Hyperf\HttpMessage\Stream\SwooleStream;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class BusinessExceptionHandle extends ExceptionHandler
{
    public function handle(Throwable $throwable, ResponseInterface $response)
    {
        // 阻止异常冒泡
        $this->stopPropagation();

        $data = json_encode([
            'code' => $throwable->getCode(),
            'message' => $throwable->getMessage(),
        ], JSON_UNESCAPED_UNICODE);

        return $response->withStatus(400)
            ->withAddedHeader('content-type', 'application/json')
            ->withBody(new SwooleStream($data));
    }

    public function isValid(Throwable $throwable): bool
    {
        return $throwable instanceof BusinessException || $throwable instanceof \InvalidArgumentException;
    }
}
