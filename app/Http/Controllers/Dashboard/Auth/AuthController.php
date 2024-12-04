<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Enums\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;
use App\DataTransferObjects\Auth\LoginDTO;
use App\Interfaces\Auth\AuthServiceInterface;

class AuthController extends Controller
{

    public function __construct(protected AuthServiceInterface $service) {}

    public function login()
    {
        return view('Dashboard.Auth.login');
    }

    public function authenticate(LoginRequest $request)
    {
        $this->service->setRole(Role::ADMIN->value)->login(LoginDTO::fromRequest($request));

        return to_route('dashboard.tasks.index');
    }

    public function logout()
    {
        Auth::logout();

        return to_route('dashboard.login');
    }
}
