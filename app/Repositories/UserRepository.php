<?php

namespace App\Repositories;

use App\Models\User;
use App\Interfaces\User\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected $model = User::class;
}
