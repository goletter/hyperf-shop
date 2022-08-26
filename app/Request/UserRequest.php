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

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|unique:users' . $this->input('id'),
            'password' => 'required|min:6',
            'email' => [
                'required',
                'regex:/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i',
                'unique:users,email,' . $this->input('id'),
            ],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => '用户名',
            'password' => '密码',
            'email' => '邮箱',
        ];
    }
}
