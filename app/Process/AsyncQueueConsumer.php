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
namespace App\Process;

use Hyperf\Process\AbstractProcess;
use Hyperf\Process\Annotation\Process;

/**
 * @Process(name="AsyncQueueConsumer")
 */
#[Process(name: 'AsyncQueueConsumer')]
class AsyncQueueConsumer extends AbstractProcess
{
    public function handle(): void
    {
    }
}
