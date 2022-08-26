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

use App\Model\Order;
use App\Request\OrderRequest;
use App\Resource\OrderResource;
use App\Service\OrderService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\GetMapping;
use Hyperf\HttpServer\Annotation\PostMapping;

/**
 * Class OrderController.
 * @Controller
 */
class OrderController extends BaseController
{
    /**
     * @Inject
     * @var OrderService
     */
    private $service;

    /**
     * @GetMapping(path="")
     */
    public function index()
    {
        $builder = Order::query()->paginate(2);

        return OrderResource::collection($builder);
    }

    /**
     * @GetMapping(path="{id:\d+}")
     */
    public function show(int $id)
    {
        $order = Order::find($id);
        return new OrderResource($order);
    }

    /**
     * @PostMapping(path="")
     */
    public function store(OrderRequest $request)
    {
        $order = $this->service->createOrder($request->validated());

        return $this->response->json($order);
    }
}
