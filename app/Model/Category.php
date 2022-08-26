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
namespace App\Model;

class Category extends Model
{
    protected $fillable = [
        'parent_id',
        'name',
        'created_at',
        'updated_at',
    ];
}
