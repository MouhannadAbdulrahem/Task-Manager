<?php

namespace App\Http\Controllers\API\Auth;

use App\Custom\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\DataTransferObjects\Auth\LoginDTO;
use App\Http\Requests\Auth\RegisterRequest;
use App\DataTransferObjects\Auth\RegisterDTO;
use App\Interfaces\Auth\AuthServiceInterface;

class AuthController extends Controller
{

    public function __construct(protected AuthServiceInterface $service) {}

    public function register(RegisterRequest $request)
    {
        $response = $this->service->register(RegisterDTO::fromRequest($request));
        return (new Response($response))->success(message: 'Registered Successfully.');
    }

    public function login(LoginRequest $request)
    {
        $response = $this->service->login(LoginDTO::fromRequest($request));

        return (new Response($response))->success(message: 'Logged In Successfully.');
    }
}
