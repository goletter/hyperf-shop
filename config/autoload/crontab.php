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
use Hyperf\Crontab\Crontab;

return [
    'enable' => true,
    'crontab' => [
        // 每天0点定时检查众筹是否结束
        /*(new Crontab())->setType('command')->setName('测试定时任务')->setRule('* 0 * * * *')->setCallback([
            'command' => 'test:to',
        ]),*/
    ],
];
