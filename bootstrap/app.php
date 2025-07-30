<?php

use App\Exceptions\ApiLevelException;

use App\Http\Middleware\CheckBranchMiddleware;
use App\Http\Middleware\ForceJsonAcceptHeaderMiddleware;
use App\Http\Middleware\IsActiveAccountMiddleware;
use App\Http\Middleware\SetAppLocalMiddleware;
use App\Http\Middleware\TokenFromCookieMiddleware;
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
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {
            // Load additional route files here
            Route::middleware(['api'])
                ->prefix('api/auth')
                ->group(base_path('routes/groups/auth.php'));

            Route::middleware(['api', 'auth:sanctum', 'is_active'])
                ->prefix('api')
                ->group(base_path('routes/groups/client.php'));

            Route::middleware(['api',  'auth:sanctum', 'is_active'])
                ->prefix('api/dashboard')
                ->group(base_path('routes/groups/dashboard.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->api(prepend: [
            ForceJsonAcceptHeaderMiddleware::class,
            SetAppLocalMiddleware::class,
            TokenFromCookieMiddleware::class,

        ]);

        $middleware->alias([
            'check.branch' => CheckBranchMiddleware::class,
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
            'is_active' => IsActiveAccountMiddleware::class
        ]);
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
