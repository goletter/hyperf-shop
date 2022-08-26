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

use App\Model\Permission;
use App\Request\PermissionRequest;
use App\Resource\PermissionResource;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\DeleteMapping;
use Hyperf\HttpServer\Annotation\GetMapping;
use Hyperf\HttpServer\Annotation\PostMapping;
use Hyperf\HttpServer\Annotation\PutMapping;

/**
 * Class PermissionController.
 * @Controller
 */
class PermissionController extends BaseController
{
    /**
     * @GetMapping(path="")
     */
    public function index()
    {
        $builder = Permission::query()->paginate(10);

        return PermissionResource::collection($builder);
    }

    /**
     * @GetMapping(path="{id:\d+}")
     */
    public function show(int $id)
    {
        $banner = Permission::find($id);
        return new PermissionResource($banner);
    }

    /**
     * @PostMapping(path="")
     */
    public function store(PermissionRequest $request)
    {
        $permission = Permission::create($request->all());

        return $this->response->json($permission);
    }

    /**
     * @PutMapping(path="{id:\d+}")
     */
    public function update(PermissionRequest $request, int $id)
    {
        $permission = Permission::find($id);
        $permission->update($request->all());
        return $this->response->json($permission);
    }

    /**
     * @DeleteMapping(path="{id:\d+}")
     */
    public function destroy(int $id)
    {
        return $this->response->json(['message' => '删除成功', 'code' => 200]);
    }
}
