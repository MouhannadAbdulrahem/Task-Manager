<?php

namespace App\DataTransferObjects\User;

use App\DataTransferObjects\BaseDTO;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;

class UserDTO extends BaseDTO
{
    public function __construct(
        public ?string $name,
        public ?string $email,
        public ?string $password,
    ) {}

    public static function fromRequest(CreateUserRequest|UpdateUserRequest $request)
    {
        return new self(
            name: $request->validated('name'),
            email: $request->validated('email'),
            password: $request->validated('password'),
        );
    }
}
