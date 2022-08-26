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

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_id' => 'required',
            'name' => 'required',
            'preview' => 'required',
            'price_market' => 'required|min:1',
            'price' => 'required|min:1',
            'content' => 'required',
        ];
    }

    public function attributes(): array
    {
        return [
            'category_id' => '分类',
            'name' => '名称',
            'preview' => '主图',
            'price_market' => '市场价',
            'price' => '现价',
            'content' => '详情',
        ];
    }
}
