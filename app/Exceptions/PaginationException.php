<?php

namespace App\Exceptions;

use Exception;
use App\Custom\Response;

class PaginationException extends Exception
{
    public static function invalidPerPageProvided()
    {
        throw new self("Page Size Query Parameter Should Be more then 0", Response::HTTP_BAD_REQUEST);
    }
}
