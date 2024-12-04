<?php

namespace App\Interfaces\User;

use App\DataTransferObjects\User\UserDTO;

interface UserServiceInterface
{
    public function all();
    public function index();
    public function show(string $taskId);
    public function create(UserDTO $DTO);
    public function update(string $taskId, UserDTO $DTO);
    public function delete(string $taskId);
}
