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
namespace App\Job;

use App\Model\Product;
use Hyperf\AsyncQueue\Job;

class ProductToSale extends Job
{
    public $product_id;

    public $type;

    public function __construct(int $product_id, int $type)
    {
        $this->product_id = $product_id;

        $this->type = $type;
    }

    public function handle()
    {
        $product = Product::find($this->product_id);

        $product->update(['status' => 4]);
    }
}
