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

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'preview',
        'price_market',
        'price',
        'content',
        'sold_count',
        'review_count',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
