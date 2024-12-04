<?php

namespace App\Models;

use App\Enums\TaskStatus;
use App\Observers\TaskObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ObservedBy(TaskObserver::class)]
class Task extends Model
{
    protected $casts = [
        'status' => TaskStatus::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeOwner(Builder $query): Builder
    {
        return $query->where('user_id', Auth::id());
    }
    public function scopeSearch(Builder $query, $value): Builder
    {
        return $query
            ->whereAny(['status', 'title', 'description'], 'LIKE', "%$value%")
            ->orWhereRelation('user', 'name', 'LIKE', "%$value%")
        ;
    }
}
