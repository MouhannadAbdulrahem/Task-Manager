<?php

namespace App\Interfaces\Auth;

use App\DataTransferObjects\Auth\LoginDTO;
use App\DataTransferObjects\Auth\RegisterDTO;

interface AuthServiceInterface
{
    public function login(LoginDTO $DTO);
    public function register(RegisterDTO $DTO);
    public function setRole(string $role);
}
