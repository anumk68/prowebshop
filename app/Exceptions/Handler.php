<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    public function render($request, Throwable $exception)
    {
        // Custom 404 handler
        if ($this->isHttpException($exception) && $exception->getStatusCode() === 404) {
            return response()->view('errors.404', [], 404);
        }

        return parent::render($request, $exception);
    }
}
