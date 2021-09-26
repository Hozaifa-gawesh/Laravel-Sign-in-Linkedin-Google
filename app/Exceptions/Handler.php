<?php

namespace App\Exceptions;

use App\Http\Controllers\ResponseJson;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Request;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Throwable;

class Handler extends ExceptionHandler
{

    use ResponseJson;
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


    public function checkPath()
    {
        switch (request()->url()) {
            case Request::is('dashboard*'):
                $path = 'dashboard';
                break;
            default:
                $path = 'front';
                break;
        }
        return $path;
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
        // HTTP Exception
        if($this->isHttpException($exception)) {
            if (($exception->getStatusCode() == 404) || ($exception->getStatusCode() == 403)) {
                if($request->wantsJson()) {
                    return $this->errorResponse(__('lang.invalid_data'));
                } else {
                    $path = $this->checkPath();
                    return response()->view($path . '.errors.' . $exception->getStatusCode(), [], $exception->getStatusCode());
                }
            }
        }

        // Model Exception
        if ($exception instanceof ModelNotFoundException && $request->wantsJson()) {
            return $this->errorResponse(__('lang.invalid_data'));

        } else if($exception instanceof ModelNotFoundException) {
            $path = $this->checkPath();
            return response()->view( $path . '.errors.404');
        }

        return parent::render($request, $exception);
    }
}
