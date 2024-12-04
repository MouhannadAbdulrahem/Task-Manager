<?php

namespace App\Services;

use App\Enums\Role;
use App\Services\BaseService;
use App\DataTransferObjects\BaseDTO;
use App\Interfaces\User\UserServiceInterface;
use App\Interfaces\User\UserRepositoryInterface;

class UserService  extends BaseService implements UserServiceInterface
{
    public function __construct(protected UserRepositoryInterface $repository) {}

    public function create(BaseDTO $DTO)
    {
        $user = parent::create($DTO);

        $user->assignRole(Role::USER->value);

        return $user;
    }
}
