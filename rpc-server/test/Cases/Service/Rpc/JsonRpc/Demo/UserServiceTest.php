<?php

namespace HyperfTest\Cases\Service\Rpc\JsonRpc\Demo;

use App\Constants\BusinessErrorCode;
use App\Service\Rpc\JsonRpc\Demo\UserService;
use PHPUnit\Framework\TestCase;

class UserServiceTest extends TestCase
{
    //测试异常输入: gender = 3
    public function test_create(){
        $testObj = new UserService();
        $rs = $testObj->create('test',3);
        $exception = [
            'code' => BusinessErrorCode::USER_GENDER_ERROR,
            'msg' => BusinessErrorCode::getMessage(BusinessErrorCode::USER_GENDER_ERROR),
            'data' => []
        ];
        $this->assertSame($exception,$rs);
    }

    public function test_create_success(){
        $testObj = new UserService();
        $rs = $testObj->create('test',1);
        $this->assertTrue(isset($rs['data']['id']));
    }
}