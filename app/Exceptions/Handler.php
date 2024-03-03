<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\JsonResponse;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    private function getCode(Throwable $e): int
    {
        // not all exceptions got method to get http status code, so we need to verify that method exists
        if (method_exists($e, 'getStatusCode')) {
            return $e->getStatusCode();
        }

        return $e->getCode() ?: Response::HTTP_BAD_REQUEST;
    }

    public function render($request, Throwable $e)
    {
        $code = $this->getCode($e);

        return new JsonResponse(['error' => ['message' => $e->getMessage(), 'code' => $code]], $code);
    }
}
