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

use App\Middleware\CasbinMiddleware;
use App\Middleware\JwtMiddleware;
use App\Model\Banner;
use App\Request\BannerRequest;
use App\Resource\BannerResource;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\DeleteMapping;
use Hyperf\HttpServer\Annotation\GetMapping;
use Hyperf\HttpServer\Annotation\Middleware;
use Hyperf\HttpServer\Annotation\Middlewares;
use Hyperf\HttpServer\Annotation\PostMapping;
use Hyperf\HttpServer\Annotation\PutMapping;

/**
 * Class BannerController.
 * @Middlewares({
 *     @Middleware(JwtMiddleware::class),
 *     @Middleware(CasbinMiddleware::class)
 * })
 * @Controller
 */
class BannerController extends BaseController
{
    /**
     * @GetMapping(path="")
     */
    public function index()
    {
        $builder = Banner::query()->paginate(2);

        return BannerResource::collection($builder);
    }

    /**
     * @GetMapping(path="{id:\d+}")
     */
    public function show(int $id)
    {
        $banner = Banner::find($id);
        return new BannerResource($banner);
    }

    /**
     * @PostMapping(path="")
     */
    public function store(BannerRequest $request)
    {
        $banner = Banner::create($request->all());

        return $this->response->json($banner);
    }

    /**
     * @PutMapping(path="{id:\d+}")
     */
    public function update(BannerRequest $request, int $id)
    {
        $banner = Banner::find($id);
        $banner->update($request->all());
        return $this->response->json($banner);
    }

    /**
     * @return \Psr\Http\Message\ResponseInterface
     * @DeleteMapping(path="{id:\d+}")
     */
    public function destroy(int $id)
    {
        $banner = Banner::find($id);
        $banner->delete();

        return $this->response->json(['message' => '删除成功', 'code' => 200]);
    }
}
