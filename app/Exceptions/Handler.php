<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

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
     * @param  \Exception  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Exception
     */
    public function render($request, Exception $exception)
    {
        if ($this->isHttpException($exception)) {
            switch($exception->getStatusCode()) {
                case 404:
                    return response()->view('errors.' . '404', [], 404);
                    break;
                case 403:
                    return response()->view('errors.' . '403', [], 403);
                    break;
                case 500:
                    return response()->view('errors.' . '500', [], 500);
                    break;
                case 422:
                    return response()->view('errors.' . '422', [], 422);
                    break;
                case 400:
                    return response()->view('errors.' . '400', [], 400);
                    break;
            }
        }
        return parent::render($request, $exception);
    }
}
