<?php
namespace App\Controller\Api;
use App\Controller\AbstractController;
use App\Service\JsonRpc\TestServiceInterface;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\RequestMapping;

/**
 * @Controller(prefix="v1/api/test")
 * @package App\Controller\Api\V1
 */
class TestController extends AbstractController
{
    /**
     * @Inject()
     * @var TestServiceInterface
     */
    private $testService;
    /**
     * @RequestMapping(path="sleep", methods="get")
     */
    public function sleep(): string
    {
        $second = intval($this->request->input('second' , 2));
        $return = $this->request->input('v' , 'unknow_value');
        sleep($second);
        return $return;
    }

    /**
     * @RequestMapping(path="test", methods="get")
     */
    public function test(){
        return $this->testService->test();
    }

}