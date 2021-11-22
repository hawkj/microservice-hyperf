<?php
namespace App\Service\Rpc\JsonRpc\Demo;
use App\Constants\BusinessErrorCode;
use App\Dao\Demo\UserDao;
use App\Util\Response;
use Hyperf\RpcServer\Annotation\RpcService;
use Hyperf\Snowflake\IdGeneratorInterface;
use Hyperf\Utils\ApplicationContext;

/**
 * @RpcService(name="UserService", protocol="jsonrpc-http", server="jsonrpc-http", publishTo="nacos")
 */
class UserService implements UserServiceInterface
{

    public function create(string $name, int $gender): array{
        if(!in_array($gender,[0,1,2])){
            return Response::JsonRpcError(BusinessErrorCode::USER_GENDER_ERROR, BusinessErrorCode::getMessage(BusinessErrorCode::USER_GENDER_ERROR));
        }
        $result = [];
        $userDao = new UserDao();
        $container = ApplicationContext::getContainer();
        $generator = $container->get(IdGeneratorInterface::class);
        $userDao->name = $name;
        $userDao->gender = $gender;
        $userDao->snow_flake_id = $generator->generate();
        $userDao -> save();
        $result['id'] = $userDao->snow_flake_id;
        return Response::JsonRpcSuccess($result);
    }

    public function getBySnowFlakeId(int $snowFlakeId): array{
        if($snowFlakeId<1){
            return Response::JsonRpcError(BusinessErrorCode::USER_SNOWFLAKEID_ERROR, BusinessErrorCode::getMessage(BusinessErrorCode::USER_SNOWFLAKEID_ERROR));
        }
        $userInfo = UserDao::select('*')->where('snow_flake_id', $snowFlakeId)->first();
        if(empty($userInfo)){
            return Response::JsonRpcError(BusinessErrorCode::USER_NOT_FOUND_ERROR, BusinessErrorCode::getMessage(BusinessErrorCode::USER_NOT_FOUND_ERROR));
        }
        return Response::JsonRpcSuccess($userInfo->toArray());
    }
}