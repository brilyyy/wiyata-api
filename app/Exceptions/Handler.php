<?php

namespace App\Exceptions;

use App\Traits\ApiResponser;
use BadMethodCallException;
use ErrorException;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Illuminate\Database\QueryException;
use Spatie\Permission\Exceptions\RoleDoesNotExist;
use Throwable;

class Handler extends ExceptionHandler
{
    use ApiResponser;
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function (Exception $e, $request) {
            if ($e instanceof NotFoundHttpException) {
                return $this->jsonResponse(404, $e->getMessage());
            }
            if ($e instanceof MethodNotAllowedException) {
                return $this->jsonResponse(405, $e->getMessage());
            }
            if ($e instanceof HttpException) {
                return $this->jsonResponse(400, $e->getMessage());
            }

            if ($e instanceof BadMethodCallException) {
                return $this->jsonResponse(405, $e->getMessage());
            }
            if ($e instanceof ErrorException) {
                return $this->jsonResponse(500, $e->getMessage());
            }
            if ($e instanceof RouteNotFoundException) {
                return $this->jsonResponse(404, $e->getMessage());
            }
            if ($e instanceof QueryException) {
                return $this->jsonResponse(400, $e->getMessage());
            }
            if ($e instanceof AuthenticationException) {
                return $this->jsonResponse(401, $e->getMessage());
            }
            if ($e instanceof AuthorizationException) {
                return $this->jsonResponse(403, $e->getMessage());
            }
            if ($e instanceof ModelNotFoundException) {
                return $this->jsonResponse(404, $e->getMessage());
            }
            if ($e instanceof ValidationException) {
                return $this->jsonResponse(422, $e->getMessage());
            }
            if ($e instanceof RoleDoesNotExist) {
                return $this->jsonResponse(500, $e->getMessage());
            }
        });
    }
}
