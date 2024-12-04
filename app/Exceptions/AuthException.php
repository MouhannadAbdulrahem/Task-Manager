<?php

namespace App\Exceptions;

use App\Custom\Response;

class AuthException extends BaseException
{
    public static function invalidCredentials()
    {
        throw new self("Invalid Credentials Provided.", Response::HTTP_BAD_REQUEST);
    }
}
