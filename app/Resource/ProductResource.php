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
namespace App\Resource;

class ProductResource extends Resource
{
    protected static $availableIncludes = [
        'category',
    ];

    public function toArray(): array
    {
        $data = parent::toArray();

        return array_merge($data, []);
    }
}
