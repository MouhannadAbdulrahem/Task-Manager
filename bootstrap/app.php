<?php

use Illuminate\Http\Request;
use App\Jobs\SendTasksSummary;
use App\Exceptions\ExceptionsHandler;
use Illuminate\Foundation\Application;
use App\Http\Middleware\ForceJsonResponse;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->prependToGroup('api', ForceJsonResponse::class);

        $middleware->redirectUsersTo('/tasks');

        $middleware->redirectGuestsTo('/');

        $middleware->alias([
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (Exception $exception) {
            if (Request::isApi()) {
                return (new ExceptionsHandler())($exception);
            } else {
                return redirect()->back()->withErrors($exception->getMessage());
            }
        });
    })
    ->withSchedule(function (Schedule $schedule) {
        $schedule->job(SendTasksSummary::class)->dailyAt('20:00');
    })->create();
