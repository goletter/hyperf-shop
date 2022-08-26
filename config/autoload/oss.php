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
return [
    'aliyun' => [
        'accessKeyId' => env('ACCESS_KEY'),
        'accessKeySecret' => env('ACCESS_SECRET'),
        'endpoint' => env('END_POINT'),
        'bucket' => env('BUCKET'),
        'path' => BASE_PATH . '/runtime/storage/',
        'timeOut' => 3600,
        'connectTimeout' => 10,
        'expire' => 60 * 60 * 24 * 365,
    ],
];
