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
use App\Model\User;
use App\Request\UserRequest;
use App\Service\UserService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\DeleteMapping;
use Hyperf\HttpServer\Annotation\PostMapping;
use Hyperf\HttpServer\Annotation\RequestMapping;

/**
 * Class AuthController.
 * @Controller
 */
class AuthController extends AbstractController
{
    /**
     * @Inject
     * @var UserService
     */
    private $userService;

    /**
     * @PostMapping(path="register")
     */
    public function register(UserRequest $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->password = password_hash($request->input('password'), PASSWORD_BCRYPT);
        $user->email = $request->input('email');
        $user->save();

        $this->userService->register();

        return $this->response->json($user);
    }

    /**
     * @RequestMapping(path="user")
     */
    public function me()
    {
        return $this->response->json(auth('api')->user());
    }

    /**
     * @PostMapping(path="login")
     */
    public function login()
    {
        $credentials = $this->request->inputs(['name', 'password']);
        if ($token = auth('api')->attempt($credentials)) {
            return $this->response->json(['token' => $token]);
        }
        throw new BusinessException('登录失败！');
    }

    /**
     * @DeleteMapping(path="logout")
     */
    public function logout()
    {
        auth('api')->logout();

        return $this->response->json(['message' => 'Successfully logged out']);
    }
}
