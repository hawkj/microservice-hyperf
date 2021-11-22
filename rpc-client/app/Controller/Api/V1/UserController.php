<?php
namespace App\Controller\Api\V1;

use App\Controller\AbstractController;
use App\Service\JsonRpc\UserServiceInterface;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\RequestMapping;

/**
 * @Controller(prefix="v1/api/user")
 * @package App\Controller\Api\V1
 */
class UserController extends AbstractController
{
    /**
     * @Inject()
     * @var UserServiceInterface
     */
    private $userService;

    /**
     * @RequestMapping(path="create", methods="post")
     */
    public function create(): array
    {
        $name = $this->request->input('name');
        $gender = $this->request->input('gender');
        return $this->userService->create($name,$gender);
    }

    /**
     * @RequestMapping(path="info", methods="get")
     */
    public function info(): array
    {
        $snowId = $this->request->input('snow_id');
        return $this->userService->getBySnowFlakeId($snowId);
    }

    /**
     * @RequestMapping(path="test", methods="get,post")
     */
    public function test(): string
    {
        return 'test';
    }

}