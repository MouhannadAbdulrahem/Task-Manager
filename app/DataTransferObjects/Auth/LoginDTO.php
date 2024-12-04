<?php

namespace App\DataTransferObjects\Auth;

use App\DataTransferObjects\BaseDTO;
use App\Http\Requests\Auth\LoginRequest;

class LoginDTO extends BaseDTO
{
    public function __construct(
        public string $email,
        public string $password,
    ) {}

    public static function fromRequest(LoginRequest $request)
    {
        return new self(
            email: $request->validated('email'),
            password: $request->validated('password'),
        );
    }
}
