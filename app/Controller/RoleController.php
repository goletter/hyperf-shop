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

use App\Exception\BusinessException;
use App\Model\Permission;
use App\Model\Role;
use App\Request\RoleRequest;
use App\Resource\RoleResource;
use Donjan\Casbin\Enforcer;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\DeleteMapping;
use Hyperf\HttpServer\Annotation\GetMapping;
use Hyperf\HttpServer\Annotation\PostMapping;
use Hyperf\HttpServer\Annotation\PutMapping;

/**
 * Class RoleController.
 * @Controller
 */
class RoleController extends BaseController
{
    /**
     * @GetMapping(path="")
     */
    public function index()
    {
        $builder = Role::query()->paginate(10);

        return RoleResource::collection($builder);
    }

    /**
     * @PostMapping(path="")
     */
    public function store(RoleRequest $request)
    {
        $data = $request->all();
        $permissions = $request->input('permissions', [1, 4]);
        unset($data['permissions']);
        $result = Role::create($data);
        $perms = Permission::whereIn('id', $permissions)->get();
        $rows = [];
        foreach ($perms as $value) {
            $rows[] = [$result->name, $value->path, $value->method];
        }
        Enforcer::AddNamedPolicies('p', $rows);

        return $this->response->json($result);
    }

    /**
     * @PutMapping(path="{id:\d+}")
     */
    public function update(RoleRequest $request, int $id)
    {
        $data = $request->all();
        $permissions = $request->input('permissions', []);
        $result = Role::find($id);
        if (! $result) {
            throw new BusinessException('请求资源不存在');
        }
        unset($data['permissions']);
        if (isset($data['name'])) {
            unset($data['name']);
        }
        $result->update($data);
        $perms = Permission::whereIn('id', $permissions)->get();
        $rows = [];
        foreach ($perms as $value) {
            $rows[] = [$result->name, $value->path, $value->method];
        }
        Enforcer::RemoveFilteredPolicy(0, $result->name);
        Enforcer::AddNamedPolicies('p', $rows);
        return $this->response->json($result);
    }

    /**
     * @DeleteMapping(path="{id:\d+}")
     */
    public function destroy(int $id)
    {
        return $this->response->json(['message' => '删除成功', 'code' => 200]);
    }
}
