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
namespace App\Controller;

use App\Model\Product;
use App\Request\ProductRequest;
use App\Resource\ProductResource;
use App\Service\QueueService;
use Hyperf\DbConnection\Db;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\GetMapping;
use Hyperf\HttpServer\Annotation\PostMapping;
use Hyperf\HttpServer\Annotation\PutMapping;

/**
 * Class ProductController.
 * @Controller
 */
class ProductController extends BaseController
{
    /**
     * @Inject
     * @var QueueService
     */
    protected $service;

    /**
     * @GetMapping(path="")
     */
    public function index()
    {
        $builder = Product::query()->paginate(10);

        return ProductResource::collection($builder);
    }

    /**
     * @GetMapping(path="{id:\d+}")
     */
    public function show(int $id)
    {
        $product = Product::find($id);

        return new ProductResource($product);
    }

    /**
     * @PostMapping(path="")
     */
    public function store(ProductRequest $request)
    {
        $product = Db::transaction(function () use ($request) {
            $product = Product::create([
                'category_id' => $request->input('category_id'),
                'name' => $request->input('name'),
                'preview' => $request->input('preview'),
                'price_market' => $request->input('price_market'),
                'price' => $request->input('price'),
                'content' => $request->input('content'),
                'status' => $request->input('status'),
            ]);

            $this->service->push(['product_id' => $product->id, 'type' => 1], 5);

            return $product;
        });

        return $this->response->json($product);
    }

    /**
     * @PutMapping(path="{id:\d+}")
     */
    public function update(ProductRequest $request, int $id)
    {
        $product = Product::find($id);
        $product = Db::transaction(function () use ($request, $product) {
            $data = $request->all();
            $product->fill($data);
            $product->save();

            $this->service->push(['product_id' => $product->id, 'type' => 1], 5);

            return $product;
        });

        return $this->response->json($product);
    }
}
