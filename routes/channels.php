<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('tasks.{userId}', function ($user, $userId) {
    return (int) $user->id === (int) $userId;
});
