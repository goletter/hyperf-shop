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

use Hyperf\DbConnection\Model\Model;

class Permission extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'parent_id',
        'path',
        'method',
        'display_name',
    ];
}
