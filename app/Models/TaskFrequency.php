<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaskFrequency extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'pattern',
    ];

    public function tasks() : HasMany
    {
        return $this->hasMany(Task::class);
    }
}
