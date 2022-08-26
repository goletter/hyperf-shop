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
namespace App\Controller;

use App\Service\OssFileServer;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\PostMapping;
use Hyperf\HttpServer\Contract\RequestInterface;

/**
 * Class UploadFileController.
 * @Controller
 */
class UploadFileController extends BaseController
{
    /**
     * @PostMapping(path="image")
     */
    public function store(RequestInterface $request, OssFileServer $serve)
    {
        $file = $request->file('file');
        $res = $serve->fileToOss($file);
        $url = $serve->oss->signUrl(config('oss.aliyun.bucket'), $res, config('oss.aliyun.expire'), 'GET');

        return $this->response->json(['path' => $url]);
    }
}
