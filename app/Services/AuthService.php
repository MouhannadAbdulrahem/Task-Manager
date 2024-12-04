<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use App\Exceptions\AuthException;
use App\DataTransferObjects\BaseDTO;
use App\Enums\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Interfaces\Auth\AuthServiceInterface;

class AuthService implements AuthServiceInterface
{
    public function __construct(protected string $role = Role::USER->value) {}

    public function login(BaseDTO $DTO)
    {
        $user = User::where('email', $DTO->email)->role($this->role)->firstOr(fn() => AuthException::invalidCredentials());

        if (!Hash::check($DTO->password, $user->password)) {
            AuthException::invalidCredentials();
        }

        if (Request::isApi()) {
            return ['token' => $user->createToken('access-token')->plainTextToken];
        } else {
            Auth::login($user);
        }
    }

    public function register(BaseDTO $DTO)
    {
        $user = User::create($DTO->toArray());

        $token = $user->createToken('access-token')->plainTextToken;
        return ['token' => $token];
    }

    public function setRole(string $role): self
    {
        $this->role = $role;
        return $this;
    }
}
