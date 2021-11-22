<?php

declare(strict_types=1);
namespace App\Constants;

use Hyperf\Constants\AbstractConstants;
use Hyperf\Constants\Annotation\Constants;

/**
 * @Constants
 */
class BusinessErrorCode extends AbstractConstants
{
    /**
     * @Message("gender is a wrong number")
     */
    public const USER_GENDER_ERROR = 500001;

    /**
     * @Message("gender is a wrong number")
     */
    public const USER_SNOWFLAKEID_ERROR = 500002;

    /**
     * @Message("user not found")
     */
    public const USER_NOT_FOUND_ERROR = 404;
}