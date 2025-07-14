<?php

use App\Exceptions\ApiLevelException;
use App\Services\ExceptionService;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
       $exceptions->dontReport([
            ApiLevelException::class,
        ]);

             $exceptions->render(function (Exception $exception, Request $request) {


            if ($request->is('api/*')) {
                if ($exception instanceof AuthenticationException) {
                    ExceptionService::authRequired();

                    throw new Exception('no token');
                }

                if ($exception instanceof NotFoundHttpException &&  $exception->getPrevious() instanceof ModelNotFoundException) {


                    ExceptionService::notFound();
                }

                if ($exception instanceof AuthorizationException) {
                    ExceptionService::unauthorizedAction();
                }

                if ($exception instanceof ValidationException) {
                    ExceptionService::validation($exception->validator->errors()->toArray());
                }

                if (
                    config('app.env') != 'local'
                    && !($exception  instanceof ApiLevelException)
                ) {
                    Log::error($exception->getMessage());

                    $exception = ExceptionService::unhandledExceptionThrowable();
                }
            }
        });
    })->create();
