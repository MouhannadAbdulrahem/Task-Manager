<?php

namespace App\DataTransferObjects\Auth;

use App\DataTransferObjects\BaseDTO;
use App\Http\Requests\Auth\RegisterRequest;

class RegisterDTO extends BaseDTO
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
    ) {}

    public static  function fromRequest(RegisterRequest $request)
    {
        return new self(
            name: $request->validated('name'),
            email: $request->validated('email'),
            password: $request->validated('password'),
        );
    }
}
