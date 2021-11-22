<?php

namespace App\Service\Rpc\JsonRpc\Demo;

use App\Util\Response;
use Hyperf\Di\Annotation\Inject;
use Hyperf\Guzzle\ClientFactory;
use Hyperf\RpcServer\Annotation\RpcService;
use Swoole\Coroutine\WaitGroup;

/**
 * @RpcService(name="TestService", protocol="jsonrpc-http", server="jsonrpc-http", publishTo="nacos")
 */
class TestService implements TestServiceInterface
{

    /**
     * @Inject
     * @var ClientFactory
     */
    public $client;

    private const REQUEST_API = "http://rpc-client-01:9502/v1/api/test/sleep";


    public function demoWithCoruntine(): array
    {
        $requests = [
            ['method' => 'get', 'return_name' => 'a', 'url' => self::REQUEST_API . '?v=a', 'options' => ['timeout' => 3]],
            ['method' => 'get', 'return_name' => 'b', 'url' => self::REQUEST_API . '?v=b', 'options' => ['timeout' => 3]],
            ['method' => 'get', 'return_name' => 'c', 'url' => self::REQUEST_API . '?v=c', 'options' => ['timeout' => 3]],
            ['method' => 'get', 'return_name' => 'd', 'url' => self::REQUEST_API . '?v=d', 'options' => ['timeout' => 3]],
            ['method' => 'get', 'return_name' => 'e', 'url' => self::REQUEST_API . '?v=e', 'options' => ['timeout' => 3]],
        ];
        $client = $this->client->create();

        $coNum = count($requests);
        $wg = new WaitGroup();
        $wg->add($coNum);
        $result = [];

        foreach ($requests as $request) {
            go(function () use ($wg, $request, $client, &$result) {
                $rs = $client->get($request['url'], $request['options']);
                $result[$request['return_name']] = $rs->getBody()->getContents();
                $wg->done();
            });
        }
        echo 'do some thing...' . PHP_EOL;
        $wg->wait();
        return $result;
    }

    public function demoWithOutCoruntine(): array
    {
        $requests = [
            ['method' => 'get', 'return_name' => 'a', 'url' => self::REQUEST_API . '?v=a', 'options' => ['timeout' => 3]],
            ['method' => 'get', 'return_name' => 'b', 'url' => self::REQUEST_API . '?v=b', 'options' => ['timeout' => 3]],
            ['method' => 'get', 'return_name' => 'c', 'url' => self::REQUEST_API . '?v=c', 'options' => ['timeout' => 3]],
            ['method' => 'get', 'return_name' => 'd', 'url' => self::REQUEST_API . '?v=d', 'options' => ['timeout' => 3]],
            ['method' => 'get', 'return_name' => 'e', 'url' => self::REQUEST_API . '?v=e', 'options' => ['timeout' => 3]],
        ];
        $client = $this->client->create();
        $result = [];
        foreach ($requests as $request) {
            $rs = $client->get($request['url']);
            $result[$request['return_name']] = $rs->getBody()->getContents();
        }
        echo 'do some thing...' . PHP_EOL;
        return $result;
    }

    public function test(): string
    {
        return 'success';
    }
}