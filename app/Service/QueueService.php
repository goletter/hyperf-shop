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
namespace App\Service;

use App\Job\ProductToSale;
use Hyperf\AsyncQueue\Driver\DriverFactory;
use Hyperf\AsyncQueue\Driver\DriverInterface;

class QueueService
{
    /**
     * @var DriverInterface;
     */
    protected $driver;

    public function __construct(DriverFactory $driver)
    {
        $this->driver = $driver->get('default');
    }

    /**
     * @param $param
     * @param int $delay 延时时间 单位秒
     * @param mixed $data
     * @return bool
     *              生产消息
     */
    public function push($data, int $delay = 0): bool
    {
        return $this->driver->push(new ProductToSale($data['product_id'], $data['type']), $delay);
    }
}
