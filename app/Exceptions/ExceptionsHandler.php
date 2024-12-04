<?php

namespace App\Exceptions;

use Exception;
use Throwable;
use App\Custom\Response;
use App\Exceptions\BaseException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Cache\LockTimeoutException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ExceptionsHandler
{
    public function __invoke(Exception|Throwable $e)
    {
        $error = $e->getMessage();
        $statusCode = $e->getCode() == 0 ? Response::HTTP_NOT_FOUND : $e->getCode();
        $responser = (new Response);

        switch (true) {
            case $e instanceof ModelNotFoundException:
                $error = 'No result for this record.';
                break;


            case $e instanceof NotFoundHttpException && str($e->getMessage())->contains('No query results for model'):
                $model = class_basename($e->getPrevious()->getModel());
                $error = "No result for this $model.";
                break;

            case $e instanceof ValidationException:
                return $responser->errors(
                    messages: collect($e->errors())->map(fn($error) => $error[0])->toArray(),
                    code: Response::HTTP_UNPROCESSABLE_ENTITY
                );
                break;

            case $e instanceof AuthenticationException:
                $statusCode = Response::HTTP_UNAUTHORIZED;
                break;


            case $e instanceof AccessDeniedHttpException:
                $statusCode = Response::HTTP_UNAUTHORIZED;
                break;

            case $e instanceof LockTimeoutException:
                $error = "Something went wrong please try again.";
                $statusCode = Response::HTTP_LOCKED;
                break;

            case $e instanceof BaseException:
                $error = $e->getMessage();
                $statusCode = $e->getCode();
                break;

            default:
                $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR;
                break;
        }
        return $responser->error(message: $error, code: $statusCode);
    }
}
