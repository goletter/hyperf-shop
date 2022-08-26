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

class PermissionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'path' => 'bail|required',
            'method' => 'bail|required',
            'display_name' => 'required',
        ];
    }

    public function attributes(): array
    {
        return [
            'path' => '权限名称',
            'method' => '请求方法',
            'display_name' => '描述',
        ];
    }
}
