<?php

use App\Service\Services;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Routing\Middleware\ThrottleRequests;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php', // Asegúrate de incluir rutas API
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Agregar Sanctum al grupo API
        $middleware->group('api', [
            EnsureFrontendRequestsAreStateful::class, // Middleware de Sanctum
            ThrottleRequests::class . ':api', // Evita el error de rate limit
            SubstituteBindings::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        
        $exceptions->render(function (Throwable $e, $request) {
            $services = new Services();
            return response()
            ->json($services->resolve($e->getMessage(), true), 500);
        });

        // Manejar rutas no encontradas (404)
        $exceptions->render(function (NotFoundHttpException $e, $request) {
            $services = new Services();
            return response()
            ->json($services->resolve('La URL que buscas no existe', true), 404);
        });
    })->create();