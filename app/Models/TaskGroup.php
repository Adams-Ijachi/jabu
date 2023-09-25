<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaskGroup extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
        'description',
        'user_id',
    ];

    public function tasks() : HasMany
    {
        return $this->hasMany(Task::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
