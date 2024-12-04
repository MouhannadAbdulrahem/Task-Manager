<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\DataTransferObjects\User\UserDTO;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Interfaces\User\UserServiceInterface;

class UserController extends Controller
{
    public function __construct(protected UserServiceInterface $service)
    {
        $this->service->scope('user');
    }

    public function index()
    {
        $users = $this->service->index();
        if (request()->ajax()) {
            return view('Dashboard.User.Sections.indexTable', compact('users'));
        }
        return view('Dashboard.User.index', compact('users'));
    }

    public function create()
    {
        return view('Dashboard.User.create');
    }

    public function store(CreateUserRequest $request)
    {
        $user = $this->service->create(UserDTO::fromRequest($request));

        Session::flash('successMessage', 'Created successfully');

        return to_route('dashboard.users.index');
    }
    public function edit(string $userId)
    {
        $user = $this->service->show($userId);

        return view('Dashboard.User.edit', compact('user'));
    }
    public function update(UpdateUserRequest $request, string $userId)
    {
        $this->service->update($userId, UserDTO::fromRequest($request));

        Session::flash('successMessage', 'Updated successfully');

        return to_route('dashboard.users.index');
    }
    public function delete(string $userId)
    {
        $this->service->delete($userId);

        Session::flash('successMessage', 'Deleted successfully');

        return to_route('dashboard.users.index');
    }
}
