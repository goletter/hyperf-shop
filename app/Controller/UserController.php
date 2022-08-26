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

use App\Model\Role;
use App\Model\User;
use App\Request\UserRequest;
use App\Resource\UserResource;
use Donjan\Casbin\Enforcer;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\GetMapping;
use Hyperf\HttpServer\Annotation\PostMapping;
use Hyperf\HttpServer\Annotation\PutMapping;

/**
 * Class UserController.
 * @Controller
 */
class UserController extends BaseController
{
    /**
     * @GetMapping(path="")
     */
    public function index()
    {
        $builder = User::query()->paginate(10);

        return UserResource::collection($builder);
    }

    /**
     * @GetMapping(path="{id:\d+}")
     */
    public function show(int $id)
    {
        $user = User::find($id);

        return new UserResource($user);
    }

    /**
     * @PostMapping(path="")
     */
    public function store(UserRequest $request)
    {
        $user = User::create($request->all());

        return $this->response->json($user);
    }

    /**
     * @PutMapping(path="/xxx/xx/{id:\d+}")
     */
    public function update(UserRequest $request, int $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        return $this->response->json($user);
    }

    /**
     * @PostMapping(path="{id:\d+}/roles")
     * @param mixed $id
     */
    public function roles($id)
    {
        $roles = $this->request->input('roles', []);
        $user = User::where('id', '<>', config('super_admin'))->find($id);
        $roleList = Role::whereIn('id', $roles)->pluck('name')->all();
        Enforcer::DeleteRolesForUser($user->name);
        foreach ($roleList as $value) {
            Enforcer::addRoleForUser($user->name, $value);
        }
        return $this->response->json($user);
    }
}
