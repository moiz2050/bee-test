<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\ErrorHandler\Exception\FlattenException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ValidationException) {
            return response([
                'status' => "fail",
                'data'   => $exception->errors()
            ], $exception->status);
        }

        $statusCode = FlattenException::createFromThrowable($exception)->getStatusCode();

        if ($exception instanceof ModelNotFoundException) {
            return response([
                'status' => "error",
                'message'   => "No Record found",
                'code'   => $statusCode
            ], $statusCode);
        }


        return response([
            'status' => "error",
            'message'   => $exception->getMessage(),
            'code'   => $statusCode
        ], $statusCode);
    }
}
