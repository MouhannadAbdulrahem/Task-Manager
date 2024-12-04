<?php

namespace App\Providers;

use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Services\TaskService;
use App\Services\UserService;
use App\Custom\CustomPaginator;
use App\Repositories\TaskRepository;
use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\Auth\AuthServiceInterface;
use App\Interfaces\Task\TaskServiceInterface;
use App\Interfaces\User\UserServiceInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Interfaces\Task\TaskRepositoryInterface;
use App\Interfaces\User\UserRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Request::macro('isApi', function () {
            return request()->wantsJson();
        });

        Model::unguard();
        $this->app->alias(CustomPaginator::class, LengthAwarePaginator::class);
        $this->bindInterfaces();
    }

    public function bindInterfaces()
    {
        $this->app->bind(AuthServiceInterface::class, AuthService::class);

        $this->app->bind(TaskServiceInterface::class, TaskService::class);
        $this->app->bind(TaskRepositoryInterface::class, TaskRepository::class);

        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);
    }
}
