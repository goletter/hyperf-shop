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

use Hyperf\ModelCache\Cacheable;
use HyperfExt\Auth\Authenticatable;
use HyperfExt\Auth\Contracts\AuthenticatableInterface;
use HyperfExt\Jwt\Contracts\JwtSubjectInterface;

class User extends Model implements JwtSubjectInterface, AuthenticatableInterface
{
    use Authenticatable;
    use Cacheable;

    protected $fillable = [
        'name',
    ];

    protected $hidden = ['password'];

    public function getJwtIdentifier()
    {
        return $this->getKey();
    }

    /**
     * JWT自定义载荷.
     */
    public function getJwtCustomClaims(): array
    {
        return [
            'guard' => 'api',    // 添加自定义信息
        ];
    }
}
