<?php

namespace App\Controller\Api\V1;

use Hyperf\Contract\ConfigInterface;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\RequestMapping;
use Hyperf\Utils\ApplicationContext;

/**
 * @Controller(prefix="v1/api/nacos")
 * @package App\Controller\Api\V1
 */
class NacosController
{
    /**
     * @RequestMapping(path="demo", methods="get")
     */
    public function demo()
    {
        $config = ApplicationContext::getContainer()->get(ConfigInterface::class);
        return $config->get('nacos_config');
    }
}