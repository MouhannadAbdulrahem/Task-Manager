<?php

namespace App\Jobs;

use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Interfaces\User\UserServiceInterface;
use App\Mail\TasksSummaryMail;

class SendTasksSummary implements ShouldQueue
{
    use Queueable;

    public function __construct() {}

    public function handle(UserServiceInterface $service): void
    {
        $users = $service->scope('user')->with('tasks')->all();
        foreach ($users as $user) {
            Mail::to($user->email)->send(new TasksSummaryMail($user->tasks));
        }
    }
}
