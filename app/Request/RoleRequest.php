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
namespace App\Request;

use Hyperf\Validation\Request\FormRequest;

class RoleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'bail|required|unique:roles' . $this->input('id'),
            'permissions' => 'required|array',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => '角色名称',
            'permissions' => '权限',
        ];
    }
}
